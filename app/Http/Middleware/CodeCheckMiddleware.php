<?php

namespace App\Http\Middleware;

use App\Models\Code;
use App\Models\UserCode;
use Closure;
use Illuminate\Http\Request;

class CodeCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     $user = auth()->user()->id;
    //     $userCode = UserCode::where('user_id', $user)->first();

    //     if ($userCode) {
    //         // Code found, proceed to the next middleware or route
    //         return $next($request);

    //     } else {
    //         // Code not found, redirect to code entry page
    //         return redirect()->route('code');
    //     }
    // }

    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        $userCode = UserCode::where('user_id', $user->id)->first();

        if ($user && isset($user->id)) {
            $userCode = UserCode::where('user_id', $user->id)->first();

            if ($userCode) {
                // Code found, proceed to the next middleware or route
                return $next($request);
            }
            else{
                // Code not found, redirect to code entry page
                return redirect()->route('code');
            }
        }

    }
}
