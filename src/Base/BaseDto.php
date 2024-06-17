<?php

namespace Davebrend\RecruitisApiProject\Base;

use Carbon\Carbon;
use ReflectionClass;
use ReflectionNamedType;
use ReflectionProperty;

abstract class BaseDto
{
    /**
     * @param array<string, mixed> $data
     * @return static
     * @throws \ReflectionException
     */
    public static function fromArray(array $data): static
    {
        $reflectionClass = new ReflectionClass(static::class);
        $instance = $reflectionClass->newInstanceWithoutConstructor();

        foreach ($data as $key => $value) {
            if ($reflectionClass->hasProperty($key)) {
                $property = $reflectionClass->getProperty($key);
                $property->setValue($instance, static::castValue($property, $value));
            }
        }

        return $instance;
    }

    /**
     * @param ReflectionProperty $property
     * @param mixed $value
     * @return mixed
     */
    protected static function castValue(ReflectionProperty $property, mixed $value): mixed
    {
        $type = $property->getType();
        $typeName = $type instanceof ReflectionNamedType ? $type->getName() : null;

        if ($typeName === null) {
            return null;
        }

        return match ($typeName) {
            Carbon::class => Carbon::parse($value),
            'int' => (int) $value,
            'bool' => (bool) $value,
            'string' => (string) $value,
            'array' => $value ?? [],
            default => self::castToObject($typeName, $value),
        };
    }

    /**
     * @param string|null $typeName
     * @param mixed $value
     * @return mixed
     */
    private static function castToObject(?string $typeName, mixed $value): mixed
    {
        if ($typeName && enum_exists($typeName) && method_exists($typeName, 'from')) {
            return $typeName::from($value);
        }

        if ($typeName && class_exists($typeName)) {
            if (is_array($value) && self::isAssoc($value)) {
                return $typeName::fromArray($value);
            }

            if (is_array($value)) {
                return array_map(fn($item) => $typeName::fromArray($item), $value);
            }
        }

        return $value;
    }

    /**
     * @param array<mixed> $data
     * @return bool
     */
    private static function isAssoc(array $data): bool
    {
        if (count($data) === 0) {
            return false;
        }

        return !array_is_list($data);
    }
}
