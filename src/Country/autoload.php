<?php

use Phpstream\Helpers\Country\Country;
use Phpstream\Helpers\Country\IsoFormat;

if (!function_exists('country')) {

    /**
     * Returns country meta-data.
     *
     * @param string $input
     * @param IsoFormat|null $type
     * @return ?stdClass
     */
    function country(string $input, ?IsoFormat $type = IsoFormat::ALPHA2): ?stdClass
    {
        return Country::from($input, $type);
    }
}

if (!function_exists('countries')) {

    /**
     * Returns country meta-data.
     *
     * @return array<stdClass>
     */
    function countries(): array
    {
        return Country::all();
    }
}
