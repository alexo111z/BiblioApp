<?php

declare(strict_types=1);

namespace App\Http\Controllers\Module;

trait UserRestrictiveModule
{
    private function getAllowedUserTypes(array $types): string
    {
        return implode(';', $types);
    }

    protected function getUserTypeMiddleware(array $types): string
    {
        return sprintf('user.type:%s', $this->getAllowedUserTypes($types));
    }
}
