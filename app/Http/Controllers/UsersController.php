<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class UsersController extends Controller
{
    public function index()
    {
        return view('usuarios.index');
    }

    public function getAll(Request $request)
    {
        $userType = (int) $request->get('userType', User::TYPE_ADMIN);

        /** @var LengthAwarePaginator $paginatorData */
        $paginatorData = null;

        if ($userType === User::TYPE_ADMIN || $userType === User::TYPE_COLLABORATOR) {
            $paginatorData = User::getAdministrators($userType);
        } else if ($userType === User::TYPE_TEACHER) {
            $paginatorData = User::getTeachers();
        } else if ($userType === User::TYPE_STUDENT) {
            $paginatorData = User::getStudents();
        } else if ($userType === User::TYPE_ADMINISTRATIVE) {
            $paginatorData = User::getAdministratives();
        }

        if ($paginatorData !== null) {
            return User::buildResponseFromPaginator($paginatorData);
        }

        return new JsonResponse(null, 400);
    }
}
