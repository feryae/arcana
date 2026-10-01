<?php

declare(strict_types=1);

namespace App\Enums;

enum UserRoleTypes: int
{
    case ADMIN = 1;
    case THERAPIST = 2;

    public function label(): string
    {
        return match ($this) {
            self::ADMIN => 'Admin',
            self::THERAPIST => 'Therapist',
        };
    }
}


