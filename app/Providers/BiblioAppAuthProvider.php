<?php

declare(strict_types=1);

namespace App\Providers;

use App\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;

class BiblioAppAuthProvider implements UserProvider
{
    /**
     * @var User
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function hasCredentials(array $credentials): bool
    {
        $credentialFields = array_keys($credentials);

        return (in_array('Nick', $credentialFields)
            && in_array('Password', $credentialFields));
    }

    public function retrieveByCredentials(array $credentials): ?Authenticatable
    {
        /** @var User $user */
        $user = null;

        if ($this->hasCredentials($credentials)) {
            $user = $this->user->fetchUserByCredentials($credentials);
        }

        return $user;
    }

    public function validateCredentials(Authenticatable $user, array $credentials): bool
    {
        /** @var bool $userHasRightCredentials */
        $userHasRightCredentials = false;

        if (!$this->hasCredentials($credentials)) {
            return $userHasRightCredentials;
        }

        $userHasRightCredentials = (
            $credentials['Nick'] === $user->getAuthIdentifier()
            && $credentials['Password'] === $user->getAuthPassword()
        );

        return $userHasRightCredentials;
    }

    public function retrieveById($identifier) {}

    public function retrieveByToken($identifier, $token) {}

    public function updateRememberToken(Authenticatable $user, $token) {}
}
