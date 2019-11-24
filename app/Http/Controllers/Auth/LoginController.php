<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(CustomGuard $biblioAuthGuard) {
        if ($biblioAuthGuard->validate()) {
            return redirect('home');
        } else {
            return redirect('login');
        }
    }
}
