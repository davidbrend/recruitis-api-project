<?php

namespace Davebrend\RecruitisApiProject\Enums;

enum CurrencyEnum : string
{
    case CZK = 'CZK';
    case USD = 'USD';
    case EUR = 'EUR';

    public static function getCurrencyByString(string $currency): ?self
    {
        return match($currency) {
            self::CZK->value => self::CZK,
            self::USD->value => self::USD,
            self::EUR->value => self::EUR,
            default => null
        };
    }
}