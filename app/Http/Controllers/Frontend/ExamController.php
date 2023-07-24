<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;

class ExamController extends Controller
{
    public function index()
    {
        $user_level = auth()->user()->level_id;

        $exams = Exam::where('level_id', $user_level)->get();

        return view('frontend.exams.index', compact('exams'));
    }


    public function showQuestion($id, $page = 1)
    {
        $exam = Exam::findOrFail($id);

        $questionsPerPage = 10;
        $offset = ($page - 1) * $questionsPerPage;

        $questions = Question::where('exam_id', $exam->id)
            ->skip($offset)
            ->take($questionsPerPage)
            ->paginate($questionsPerPage);

        $selectedValues = session('selected_values', []);

        // Customize the paginator URL for proper pagination links
        $questions->withPath(route('show-question', ['id' => $id]));

        return view('frontend.exams.show_questions', compact('questions', 'page', 'exam', 'selectedValues'));
    }




public function submitAnswers(Request $request)
{
    $validatedData = $request->validate([
        'answers.*' => 'required',
    ]);

    $selectedValues = session('selected_values', []);

    foreach ($validatedData['answers'] as $questionId => $selectedAnswer) {
        $selectedValues[$questionId] = $selectedAnswer;
        $question = Question::find($questionId);
        $question->is_correct = $selectedAnswer;
        $question->save();
    }

    session(['selected_values' => $selectedValues]);

    return redirect()->route('result-page');
}

}
