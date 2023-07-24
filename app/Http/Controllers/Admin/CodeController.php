<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CodeRequest;
use App\Models\Code;
use App\Models\Level;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CodeController extends Controller
{
    public function index()
    {
        $levels = Level::all();
        $codes = Code::with('level')->select('id', 'level_id', 'code')->paginate();
        return view('admin.code.index', compact('levels', 'codes'));
    }

    public function store(CodeRequest $request)
    {
        for ($i = 0; $i < $request->count; $i++) {
            Code::create([
                'level_id' => $request->level_id,
                'code' => Str::random(10),
            ]);
        }

        return redirect()->route('admin.codes.index')->with('message', 'تم انشاء الكود بنجاح');
    }

    public function destroy($id)
    {
        Code::findOrFail($id)->delete();
        return redirect()->route('admin.codes.index')->with('message', 'تم حذف الكود بنجاح');
    }

}
