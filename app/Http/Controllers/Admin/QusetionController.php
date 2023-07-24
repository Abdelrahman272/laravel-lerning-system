<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;

class QusetionController extends Controller
{
    public function index()
    {
        $questions = Question::all();

        return view('admin.question.index', compact('questions'));
    }

    public function create()
    {
        $exams = Exam::all();
        return view('admin.question.create', compact('exams'));
    }

    public function store(QuestionRequest $request)
    {
        Question::create([
            'exam_id' => $request->exam_id,
            'question_text' => $request->question_text,
            'answers' => $request->answers,
            'is_correct' => $request->is_correct,
            'score' => $request->score,
        ]);

        return redirect()->route('admin.questions.create')->with('message', 'تم اضافة السؤال بنجاح');
    }

    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $exams = Exam::all();
        return view('admin.question.edit', compact('question', 'exams'));
    }

    public function update(QuestionRequest $request, $id)
    {
        $question = Question::findOrFail($id);
        $question->update([
            'exam_id' => $request->exam_id,
            'question_text' => $request->question_text,
            'answers' => $request->answers,
            'is_correct' => $request->is_correct,
            'score' => $request->score,
        ]);

        return redirect()->route('admin.exams.show', $question->id)->with('message', 'تم تحديث السؤال بنجاح');
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->route('admin.exams.index')->with('message', 'تم حذف السؤال بنجاح');
    }
}
