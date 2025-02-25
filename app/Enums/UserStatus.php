<?php

namespace App\Enums;

enum UserStatus:string
{
    case ACTIVE = 'Active';
    case Banned = 'Banned';
    case Verified = 'Verified';
    case Unverified = 'Unverified';
}
