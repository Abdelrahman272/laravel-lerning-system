<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Session;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function index()
    {
        $user = auth()->user()->level_id;

        $sessions = Session::where('level_id', $user)
            ->select('id', 'name', 'episode', 'video', 'level_id')
            ->latest('created_at')
            ->paginate(8);
        return view('frontend.sessions.index', compact('sessions'));
    }
}
