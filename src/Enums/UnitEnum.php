<?php

namespace Davebrend\RecruitisApiProject\Enums;

enum UnitEnum : string
{
    case MONTH = 'month';
    case HOUR = 'hour';
    case MANDAY = 'manday';

    public static function getCurrencyByString(string $currency): ?self
    {
        return match($currency) {
            self::MONTH->value => self::MONTH,
            self::HOUR->value => self::HOUR,
            self::MANDAY->value => self::MANDAY,
            default => null
        };
    }
}