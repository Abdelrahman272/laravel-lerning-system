<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AskRequest;
use App\Models\Ask;
use Illuminate\Http\Request;

class AskController extends Controller
{
    public function index()
    {
        return view('frontend.ask.index');
    }

    public function store(AskRequest $request)
    {
        $validatedData = $request->validated();

        Ask::create($validatedData);

        return redirect()->route('ask.index')->with('message', 'تم الاضافة بنجاح');
    }

    public function showAnswer()
    {
        $asks = Ask::with('answers')->paginate();

        return view('frontend.ask.answer', compact('asks'));
    }
}
