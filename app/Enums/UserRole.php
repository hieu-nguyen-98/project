<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

final class UserRole extends Enum implements LocalizedEnum
{
    const SUPPER_ADMIN = 1;

    const ADMIN = 2;

    const USER = 3;

    const SELLER = 4;

    public static function getListRoleAccept()
    {
        $currentUser = auth()->user();

        if (! $currentUser) {
            return [];
        }

        if ($currentUser->role == self::SUPPER_ADMIN) {
            return [
                self::SUPPER_ADMIN,
                self::ADMIN,
                self::USER,
                self::SELLER,
            ];
        }
        if ($currentUser->role == self::ADMIN) {
            return [
                self::USER,
                self::SELLER,
            ];
        }
        if ($currentUser->role == self::USER) {
            return [
                self::SELLER,
            ];
        }
    }
}
