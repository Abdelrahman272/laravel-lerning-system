<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Hash;
use Termwind\Components\Hr;

class StudentController extends Controller
{
    public function index()
    {
        $users = User::select('users.id');
        return view('admin.students.index', compact('users'));
    }

    public function getStudents(Request $request)
    {
        if ($request->ajax()) {
            $data = User::with('level')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route("admin.students.edit", $row->id) . '" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary btn-sm editPost">تحديث</a>';

                    $btn = $btn . ' <a href="' . route("admin.students.delete", $row->id) . '" data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-sm deletePost">حذف</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create()
    {
        $levels = Level::select('id', 'name')->get();
        return view('admin.students.create', compact('levels'));
    }

    public function store(StudentRequest $request)
    {
        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'parent_phone' => $request->parent_phone,
            'level_id' => $request->level_id,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.students.index')->with('message', 'تم اضافة المستخدم بنجاح');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $levels = Level::select('id', 'name')->get();
        return view('admin.students.edit', compact('user', 'levels'));
    }

    public function update(StudentRequest $request)
    {
        $id = $request->id;
        $user = User::find($id);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'parent_phone' => $request->parent_phone,
            'level_id' => $request->level_id,
        ]);

        return redirect()->route('admin.students.index')->with('message', 'تم تحديث المستخدم بنجاح');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.students.index')->with('message', 'تم حذف المستخدم بنجاح');
    }
}
