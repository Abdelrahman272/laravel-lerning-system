<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExamRequest;
use App\Models\Exam;
use App\Models\Level;
use App\Models\Question;
use App\Models\Session;
use Carbon\Carbon;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::with('level')->paginate(10);
        return view('admin.exams.index', compact('exams'));
    }

    public function show($id)
    {
        $exam = Exam::findOrFail($id);
        $questions = Question::where('exam_id', $id)->paginate(10);
        return view('admin.exams.show', compact('exam', 'questions'));
    }

    public function create()
    {
        $levels = Level::Selection()->get();
        $sessions = Session::all();
        return view('admin.exams.create', compact('levels', 'sessions'));
    }

    public function store(ExamRequest $request)
    {
        $start_time = Carbon::parse($request->start_time); // Assuming you have the start time value
        $duration = $request->duration; // Assuming you have the duration value
        $end_time = $start_time->copy()->addMinutes($duration);

        Exam::create([
            'name' => $request->name,
            'level_id' => $request->level_id,
            'session_id' => $request->session_id,
            'question_count' => $request->question_count,
            'score' => $request->score,
            'duration' => $request->duration,
            'start_time' => $start_time,
            'end_time' => $end_time,
        ]);

        return redirect()->route('admin.exams.index')->with('message', 'تم اضافة الامتحان بنجاح');
    }

    public function destroy($id)
    {
        $exam = Exam::findOrFail($id);
        $exam->delete();

        return redirect()->route('admin.exams.index')->with('message', 'تم حذف الامتحان بنجاح');
    }
}
