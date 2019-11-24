<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Http\Controllers\Auth\CustomGuard;
use \Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BiblioAppAuth
{
    const GUARD_SERVICE_NAME = 'biblioAuthGuard';

    /**
     * @var Factory
     */
    private $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function handle(Request $request, Closure $next)
    {
        if ($this->isAuthenticated()) {
            return $next($request);
        }

        return redirect($this->redirectTo($request));
    }

    protected function isAuthenticated(): bool
    {
        if ($this->auth->guard(self::GUARD_SERVICE_NAME)->check()) {
            $this->auth->shouldUse(self::GUARD_SERVICE_NAME);

            return true;
        }

        return false;
    }

    protected function redirectTo(Request $request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
