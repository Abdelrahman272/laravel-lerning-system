<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Level;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $levels = Level::select('id', 'name')->get();
        $user = $request->user();

        return view('profile.edit', compact('user', 'levels'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        $user = Auth::user();

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'parent_phone' => $request->parent_phone,
            'level_id' => $request->level_id
        ]);

        return redirect()->back()->with('message', 'تم تحديث بيانات المستخدم بنجاح');
    }

    public function editPassword()
    {
        $user = Auth::user();
        return view('profile.editPassword', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ],
        [
            'new_password.confirmed' => 'الرقم السري غير متطابق',
            'required' => 'الرقم السري مطلوب',
        ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth::guard('web')->user()->password)) {

            return back()->with("error", "الرقم السري غير متطابق");
        }

        // Update The new password
        User::whereId(auth()->guard('web')->user()->id)->update([
            'password' => Hash::make($request->new_password)

        ]);
        return back()->with("message", "تم تغيير الرقم السري بنجاح");

    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
