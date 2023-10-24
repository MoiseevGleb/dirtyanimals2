<?php

namespace App\Enums\Models\User;

enum RoleEnum: string
{
    case ADMIN = 'admin';
    case USER = 'user';
}
