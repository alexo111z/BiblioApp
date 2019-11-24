<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Providers\BiblioAppAuthProvider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;

class CustomGuard implements Guard
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var BiblioAppAuthProvider
     */
    protected $provider;

    /**
     * @var User|null
     */
    protected $user;

    public function __construct(BiblioAppAuthProvider $authProvider, Request $request)
    {
        $this->provider = $authProvider;
        $this->request = $request;
        $this->user = null;
    }

    public function attempt(array $credentials): bool
    {
        return $this->validate($credentials);
    }

    public function check(): bool
    {
        return !is_null($this->user());
    }

    public function guest(): bool
    {
        return !$this->check();
    }

    public function user(): ?Authenticatable
    {
        return $this->user;
    }

    public function id()
    {
        if ($this->check()) {
            return $this->user->getAuthIdentifier();
        }

        return null;
    }

    protected function username(): string
    {
        return User::ADMINS_FIELD_NICK;
    }

    protected function password(): string
    {
        return User::USERS_FIELD_PASSWORD;
    }

    public function getCredentials(): array
    {
        return $this->request->only(
            $this->username(),
            $this->password()
        );
    }

    public function validate(array $credentials = []): bool
    {
        if (empty($credentials)) {
            $credentials = $this->getCredentials();
        }

        if (!$this->provider->hasCredentials($credentials)) {
            return false;
        }

        /** @var User $user */
        $user = $this->provider->retrieveByCredentials($credentials);

        if ($user !== null && $this->provider->validateCredentials($user, $credentials)) {
            $this->setUser($user);

            return true;
        }

        return false;
    }

    public function setUser(Authenticatable $user): void
    {
        $this->user = $user;
    }
}
