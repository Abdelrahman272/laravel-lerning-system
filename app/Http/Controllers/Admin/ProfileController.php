<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPasswordRequest;
use App\Http\Requests\AdminProfileRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile.index', compact('admin'));
    }

    public function update(AdminProfileRequest $request)
    {
        $id = Auth::guard('admin')->user()->id;
        $admin = Admin::findOrFail($id);

        // ...
        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('uploads/admin_images/'.$admin->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/admin_images'),$filename);
            $admin->photo = $filename;
        }

        $admin->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'photo' => $filename,
        ]);

        // ...
        return redirect()->back()->with('message', 'تم تحديث البيانات بنجاح');
    }

    public function updatePassword(AdminPasswordRequest $request)
    {
        // Match The Old Password
        if (!Hash::check($request->old_password, auth::guard('admin')->user()->password)) {
            return back()->with("error", "الرقم السري غير متطابق");
        }

        // Update The new password
        Admin::whereId(auth()->guard('admin')->user()->id)->update([
            'password' => Hash::make($request->new_password)

        ]);
        return back()->with("message", "تم تغيير الرقم السري بنجاح");

    }


}
