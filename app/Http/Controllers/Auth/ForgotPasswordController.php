<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Karyawan;

class ForgotPasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('auth.change-password');
    }

    public function changePassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Periksa apakah password lama benar
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak cocok']);
        }

        $karyawan = Karyawan::where('id_karyawan', $request->id_karyawan)->first();
        $karyawan->update([
            'password' => Hash::make($request->new_password),
        ]);



        return redirect()->route('ganti-password')->with('success', 'Password berhasil diganti');
    }
}
