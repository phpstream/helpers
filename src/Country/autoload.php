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
