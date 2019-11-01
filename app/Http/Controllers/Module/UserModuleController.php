<?php

namespace App\Http\Controllers\Module;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserModuleController extends Controller
{
    use UserRestrictiveModule;

    protected $allowedUserTypes = [
        User::TYPE_ADMIN,
        User::TYPE_COLLABORATOR,
    ];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware($this->getUserTypeMiddleware($this->allowedUserTypes));
    }

    public function index()
    {
        return view('dashboard/users');
    }
}
