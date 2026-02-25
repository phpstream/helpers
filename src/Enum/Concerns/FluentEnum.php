<?php

namespace Phpstream\Helpers\Enum\Concerns;

use BackedEnum;
use Illuminate\Support\Arr;

/**
 * @mixin BackedEnum
 */
trait FluentEnum
{
    /**
     * Determines if the given value matches the enum value.
     *
     * @param mixed $matchingValue
     * @return bool
     */
    public function is(mixed $matchingValue): bool
    {
        if ($matchingValue instanceof BackedEnum)
            $matchingValue = $matchingValue->value;

        return $this->value === $matchingValue;
    }

    /**
     * Determines if any of the given values matches the enum value.
     *
     * @param mixed|array $matchingValues
     * @return bool
     */
    public function isOneOf(...$matchingValues): bool
    {
        if (count($matchingValues) === 1 && is_array($matchingValues[0] ?? null))
            $matchingValues = $matchingValues[0];

        foreach ($matchingValues as $value) {
            if ($this->is($value)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determines if all the given values do not match the enum value.
     *
     * @param mixed|array $matchingValues
     * @return bool
     */
    public function isNotOneOf(...$matchingValues): bool
    {
        return !$this->isOneOf(...$matchingValues);
    }

    /**
     * Inverse of is($matchingValue). Determines if the given string does not match the enum value.
     *
     * @param mixed $matchingValue
     * @return bool
     */
    public function isNot(mixed $matchingValue): bool
    {
        return !$this->is($matchingValue);
    }

    /**
     * Return a random value of the enum cases.
     *
     * @param int|null $count
     * @return array|static
     */
    public static function randomValue(int|null $count = null): array|string
    {
        return Arr::random(array_column(self::cases(), 'value'), $count);
    }

    /**
     * Return a random case of the enum cases.
     *
     * @param int|null $count
     * @return array|static
     */
    public static function randomCase(int|null $count = null): array|static
    {
        return Arr::random(self::cases(), $count);
    }

    /**
     * @param string $separator
     * @return string
     */
    public static function implode(string $separator = ','): string
    {
        return implode($separator, self::toArray());
    }

    /**
     * Returns an array of possible enum values.
     *
     * @return array
     */
    public static function toArray(): array
    {
        return array_column(self::cases(), 'value');
    }
}