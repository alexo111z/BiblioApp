<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

trait AuthenticateBiblioAppUsers
{
    use AuthenticatesUsers;

    protected function attemptLogin(Request $request): bool
    {
        return $this->guard()->attempt(
            $this->credentials($request)
        );
    }



    protected function credentials(Request $request): array
    {
        return $request->only(
            $this->username(),
            'Password'
        );
    }
}
