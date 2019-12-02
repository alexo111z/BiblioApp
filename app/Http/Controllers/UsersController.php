<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class UsersController extends Controller
{
    public function index()
    {
        $careers = DB::table('tblcarreras')
            ->select([
                'Clave',
                'Nombre',
            ])
            ->where('Existe', 1)
            ->get();

        return view(
            'usuarios.index',
            [
                'careers' => $careers,
            ]
        );
    }

    public function indexPrestatarios()
    {
        $careers = DB::table('tblcarreras')
            ->select([
                'Clave',
                'Nombre',
            ])
            ->where('Existe', 1)
            ->get();

        return view(
            'usuarios.prestatarios',
            [
                'careers' => $careers,
            ]
        );
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

    public function create(Request $request)
    {
        $userType = (int) $request->get('userType', User::TYPE_ADMIN);
        $user = new User($userType);

        $user->fromRequest($request);

        if ($user->create()) {
            return new JsonResponse([
                'user' => $user->getData(),
            ], 201);
        }

        return new JsonResponse(null, 403);
    }

    public function update(Request $request)
    {
        $userType = (int) $request->get('userType', User::TYPE_ADMIN);
        $user = new User($userType);

        $user->fromRequest($request);

        if ($user->update()) {
            return new JsonResponse([
                'user' => $user->getData(),
            ], 200);
        }

        return new JsonResponse(null, 403);
    }

    public function delete(Request $request)
    {
        $userType = (int) $request->get('userType', User::TYPE_ADMIN);
        $user = new User($userType);

        $user->fromRequest($request);

        return new JsonResponse(
            null,
            ($user->delete()) ? 200 : 403
        );
    }
}
