<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SessionRequest;
use App\Models\Level;
use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index()
    {
        $sessions = Session::with('level')->select('id', 'name', 'level_id', 'episode', 'created_at')->paginate(10);
        return view('admin.sessions.index', compact('sessions'));
    }

    public function create()
    {
        $levels = Level::all();
        return view('admin.sessions.create', compact('levels'));
    }

    public function store(SessionRequest $request)
    {
        if ($request->hasFile('video')) {

            $filename = now()->timestamp . '_' . $request->file('video')->getClientOriginalName();
            $filePath = "uploads/videos/" . $filename;
            $request->file('video')->move('uploads/videos', $filename);
        }

        Session::create([
            'name' => $request->name,
            'episode' => $request->episode,
            'level_id' => $request->level_id,
            'video' => $filePath,
            'created_at' => now(),
        ]);

        return redirect()->route('admin.sessions.index')->with('message', 'تم اضافة الحصة بنجاح');
    }

    public function edit($id)
    {
        $session = Session::findOrFail($id);
        $levels = Level::all();
        return view('admin.sessions.edit', compact('session', 'levels'));
    }

    public function update(SessionRequest $request, $id)
    {
        $old_video = $request->old_video;
        $session = Session::findOrFail($id);

        if ($request->hasFile('video')) {
            if ($old_video != null) {
                @unlink($old_video);
            }
            $filename = now()->timestamp . '_' . $request->file('video')->getClientOriginalName();
            $filePath = "uploads/videos/" . $filename;
            $request->file('video')->move('uploads/videos', $filename);

            $session->update([
                'video' => $filePath
            ]);
        }

        $session->update([
            'name' => $request->name,
            'episode' => $request->episode,
            'level_id' => $request->level_id,
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.sessions.index')->with('message', 'تم تحديث الحصة بنجاح');
    }

    public function destroy($id)
    {

        $session = Session::findOrFail($id);
        $video = $session->video;
        @unlink($video);
        Session::findOrFail($id)->delete();
        return redirect()->route('admin.sessions.index')->with('message', 'تم حذف الحصة بنجاح');
    }
}
