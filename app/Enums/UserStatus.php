<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserStatus extends Enum
{
    const PENDING = 0;
    const SUCCESS = 1;
    const FAILED = 2;

    public static function getDescription($value): string
    {
        if ($value === self::PENDING) {
            return '待验证';
        }
        if ($value === self::SUCCESS) {
            return '验证成功';
        }
        if ($value === self::FAILED) {
            return '验证失败';
        }

        return parent::getDescription($value);
    }
}
