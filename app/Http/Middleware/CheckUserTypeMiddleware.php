<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\User;
use \Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserTypeMiddleware
{
    public function handle(Request $request, Closure $next, $userTypes)
    {
        /** @var User $user */
        $user = Auth::user();

        $allowedUserTypes = explode(';', $userTypes);

        if (!in_array($user->user_type, $allowedUserTypes)) {
            return redirect('home');
        }

        return $next($request);
    }
}
