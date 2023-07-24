<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LevelRequest;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
        $levels = Level::Selection()->paginate();
        return view('admin.level.index', compact('levels'));
    }

    public function create()
    {
        return view('admin.level.create');
    }

    public function store(LevelRequest $request)
    {
        $validatedData = $request->validated();

        Level::create($validatedData);

        return redirect()->route('admin.levels.index')->with('message', 'تم الاضافة بنجاح');
    }

    public function edit(Level $level)
    {
        $level = Level::Selection()->find($level->id);
        return view('admin.level.edit', compact('level'));
    }

    public function update(LevelRequest $request, Level $level)
    {
        $validatedData = $request->validated();

        $level->update($validatedData);

        return redirect()->route('admin.levels.index')->with('message', 'تم التعديل بنجاح');
    }

    public function destroy(Level $level)
    {
        $level->delete();

        return redirect()->route('admin.levels.index')->with('message', 'تم الحذف بنجاح');
    }
}
