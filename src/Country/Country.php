<?php

namespace Phpstream\Helpers\Country;

use stdClass;

class Country
{
    /**
     * Retrieve all country data.
     *
     * @return array
     */
    public static function all(): array
    {
        return array_map(fn($item) => (object)$item, require __DIR__ . '/data.php');
    }

    /**
     * Key by a specific key from the data for all countries.
     *
     * @param string $key
     * @return array
     */
    public static function keyBy(string $key): array
    {
        $data = self::all();

        return array_column($data, null, $key);
    }

    /**
     * Alias of keyBy().
     *
     * @param string $key
     * @return array
     */
    public static function by(string $key): array
    {
        return self::by($key);
    }

    /**
     * Retrieve country information based on a specific code type and value
     *
     * @param string $input The country code to look up
     * @param IsoFormat|null $type See IsoFormat. Defaults to IsoFormat::ALPHA2
     * @return stdClass|null Returns object with all country info or null if not found
     */
    public static function from(string $input, ?IsoFormat $type = IsoFormat::ALPHA2): ?stdClass
    {
        $data = self::keyBy($type->value);
        $data = $data[trim($input)] ?? null;

        if ($data) {
            return (object)$data;
        }

        return null;
    }
}