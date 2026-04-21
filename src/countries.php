<?php

use Phpstream\Helpers\Country\Country;

if (!function_exists('country')) {

    /**
     * Returns true if the given class, its parent classes or trait of their traits have the given trait.
     *
     * @param string $input
     * @param IsoFormat|null $type
     * @return bool
     */
    function country(string $input, ?IsoFormat $type = IsoFormat::ALPHA2): bool
    {
        return Country::from($input, $type) !== null;
    }
}
