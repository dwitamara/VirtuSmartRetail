<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Role;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $role = Role::where('id_role', Auth::user()->id_role)->first();
        if ($role) {
            Session::put('user_role', $role);
        }
        return view('dashboard', ['role' => $role]);
    }
}
