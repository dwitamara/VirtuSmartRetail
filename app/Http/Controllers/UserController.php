<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Show the form for changing password.
     */
    public function showChangePasswordForm()
    {
        return view('user.change-password');
    }

    /**
     * Handle the password change request.
     */
    public function changePassword(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.changePasswordForm')
                             ->withErrors($validator)
                             ->withInput();
        }

        // Check if the current password is correct
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak sesuai.']);
        }

        // Update the user's password
        Auth::user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('dashboard')->with('success', 'Password berhasil diganti.');
    }
}
