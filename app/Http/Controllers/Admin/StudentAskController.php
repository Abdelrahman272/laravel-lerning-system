<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Ask;
use Illuminate\Http\Request;

class StudentAskController extends Controller
{
    public function index()
    {
        $asks = Ask::select('id', 'question')->paginate(10);

        return view('admin.student-ask.index', compact('asks'));
    }

    public function answer($id)
    {
        $ask = Ask::findOrFail($id);

        $answers = Answer::where('ask_id', $id)->select('id', 'answer', 'ask_id')->get();

        return view('admin.student-ask.answer', compact('ask', 'answers'));
    }

    public function updateOrCreateAnswer(Request $request, $id)
    {
        $question = Answer::updateOrCreate(
            ['ask_id' => $id],
            ['answer' => $request->input('answer')]
        );

        return redirect()->route('admin.student-asks.index')->with('message', 'تم الرد علي السؤال بنجاح');
    }

    public function destroy($id)
    {
        Ask::findOrFail($id)->delete();

        return redirect()->route('admin.student-asks.index')->with('message', 'تم الحذف بنجاح');
    }
}
