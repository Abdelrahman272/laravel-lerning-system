<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $levels = Level::all();
        return view('auth.register', compact('levels'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // 'email' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|unique:users',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|unique:users',
            'parent_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            // 'email' => $request->email,
            'phone' => $request->phone,
            'parent_phone' => $request->parent_phone,
            'password' => Hash::make($request->password),
            'level_id'  => '1',
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
