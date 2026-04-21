<?php

namespace Phpstream\Helpers\Country;

enum IsoFormat: string
{
    case NUMERIC = 'numeric';
    case ALPHA2 = 'alpha2';
    case ALPHA3 = 'alpha3';
}