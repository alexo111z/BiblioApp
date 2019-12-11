<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\CustomGuard;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
}
