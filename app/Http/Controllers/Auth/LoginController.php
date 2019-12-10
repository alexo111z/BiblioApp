<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    protected $redirectTo = '/home';

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request): JsonResponse
    {
        /** @var User $user */
        $user = (new User(User::TYPE_ADMIN))
            ->fetchUserByCredentials(
                $this->getCredentialsFromRequest($request)
            );

        if ($user !== null) {
            $successResponse = new JsonResponse(
                [
                    'message' => 'El usuario y contraseña son correctos, bienvenido',
                    'sessionData' => $user->getData(),
                ],
                200
            );
        }

        $errorResponse = new JsonResponse(
            [
                'message' => 'El usuario o la contraseña son incorrectas, intenta de nuevo',
            ],
            403
        );

        if ($user !== null) {
            Session::put('userData', $user->getData());
        }

        return ($user !== null)
            ? $successResponse
            : $errorResponse;
    }

    private function getCredentialsFromRequest(Request $request): array
    {
        $credentials = [
            User::ADMINS_FIELD_NICK => $request->get(User::ADMINS_FIELD_NICK, ''),
            User::USERS_FIELD_PASSWORD => $request->get(User::USERS_FIELD_PASSWORD, ''),
        ];

        return array_filter($credentials);
    }
}
