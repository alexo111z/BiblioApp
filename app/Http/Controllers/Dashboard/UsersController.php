<?php

declare(strict_types=1);

namespace App\Http\Controllers\Dashboard;

use App\Http\Resources\UserResource;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected const PAGE_ITEMS_SIZE = 5;

    public function index(Request $request)
    {
        $userType = $request->get('userType', User::TYPE_ADMIN);

        if (!in_array($userType, User::SESSION_TYPES)) {
            $userType = User::TYPE_ADMIN;

            $request->offsetSet('userType', $userType);
        }

        $users = User::where('user_type', $userType)
            ->orderBy('id', 'desc')
            ->paginate(self::PAGE_ITEMS_SIZE);

        return UserResource::collection($users);
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function store(Request $request)
    {
        $userToCreate = $request->all();
        $userToCreate['password'] = bcrypt($userToCreate['password']);

        $user = User::create($userToCreate);
        $userCreatedResponse = (new UserResource($user))->toResponse($request);

        $userCreatedResponse->setStatusCode(201);

        return $userCreatedResponse;
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        $userToCreate = $request->all();

        if(isset($userToCreate['password'])) {
            $userToCreate['password'] = bcrypt($userToCreate['password']);
        }

        $user->update($userToCreate);

        $userUpdatedResponse = (new UserResource($user))->toResponse($request);

        $userUpdatedResponse->setStatusCode(200);

        return $userUpdatedResponse;
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->first();

        $user->delete();

        return response()->json(null, 204);
    }
}
