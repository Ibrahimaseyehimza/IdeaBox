<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // Tu peux récupérer les idées, stats, etc.
        return view('dashboard_user', compact('user'));
    }
}
