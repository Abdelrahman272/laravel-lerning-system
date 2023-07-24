<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\Session;
use App\Models\UserCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function welcome()
    {
        $sessions = Session::select('id', 'name', 'episode', 'video', 'level_id')->latest('created_at')->take(4)->get();
        return view('welcome', compact('sessions'));
    }

    public function index()
    {
        return view('dashboard');
    }

    public function showCodeEntryForm()
    {
        $user = Auth::user()->id;

        $userCode = UserCode::where('user_id', $user)->first();

        if ($userCode) {
            // Code found, proceed to the next middleware or route
            return redirect()->route('dashboard');
        }else{
            // Code not found, redirect to code entry page
            return view('frontend.home.code');
        }
    }

    public function submitCode(Request $request)
    {
        // Validate the 'code' field in the request
        $request->validate([
            'code' => 'required|exists:codes|string',
        ], [
            'code.unique' => 'هذا الكود صالح',
            'code.exists' => 'هذا الكود غير موجود',
            'code.required' => 'هذا الكود مطلوب',
        ]);

        // Get the authenticated user and their level ID
        $user = auth()->user();
        $userLevel = $user->level_id;

        // Find the code based on the provided value and user's level
        $code = Code::where('code', $request->code)->where('level_id', $userLevel)->first();

        if ($code) {
            // Check if the user has already used this code
            $userCode = UserCode::where('user_id', $user->id)->where('code_id', $code->id)->first();

            if (!$userCode) {
                // Code not used by the user, so create a new UserCode record
                UserCode::create([
                    'user_id' => $user->id,
                    'code_id' => $code->id,
                ]);

                // Redirect to the dashboard
                return redirect()->route('dashboard');
            } else {
                // Code already used by the user, redirect to code page with a message
                return redirect()->route('code')->with('message', 'هذا الكود موجود');
            }
        } else {
            // Code not found, redirect to code page with a message
            return redirect()->route('code')->with('message', 'هذا الكود غير موجود');
        }
    }




}
