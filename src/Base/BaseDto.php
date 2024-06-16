<?php

namespace Davebrend\RecruitisApiProject\Base;

use Carbon\Carbon;
use ReflectionClass;
use ReflectionProperty;

abstract class BaseDto
{
    public static function fromArray(array $data): static
    {
        $instance = new static();
        $reflectionClass = new ReflectionClass($instance);

        foreach ($data as $key => $value) {
            if ($reflectionClass->hasProperty($key)) {
                $property = $reflectionClass->getProperty($key);
                $property->setValue($instance, static::castValue($property, $value));
            }
        }

        return $instance;
    }

    private static function castValue(ReflectionProperty $property, $value)
    {
        $type = $property->getType()?->getName();

        switch ($type) {
            case Carbon::class:
                return $value ? Carbon::parse($value) : null;
            case 'int':
                return (int)$value;
            case 'bool':
                return (bool)$value;
            case 'string':
                return (string)$value;
            case 'array':
                return $value ?? [];
            default:
                if (enum_exists($type)) {
                    return $type::from($value);
                }

                if (class_exists($type)) {
                    if (is_array($value) && self::isAssoc($value)) {
                        return call_user_func([$type, 'fromArray'], $value);
                    }

                    if (is_array($value)) {
                        return array_map(fn($item) => call_user_func([$type, 'fromArray'], $item), $value);
                    }
                }

                return $value;
        }
    }

    private static function isAssoc(array $data): bool
    {
        if (count($data) === 0) {
            return false;
        }

        return array_keys($data) !== range(0, count($data) - 1);
    }
}