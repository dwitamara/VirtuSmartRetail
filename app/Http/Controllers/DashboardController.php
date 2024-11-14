<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $role = Role::where('id_role', Auth::user()->id_role)->first();
        return view('dashboard', ['role' => $role]);
    }

}
