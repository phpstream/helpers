<?php

if (!function_exists('has_trait')) {

    /**
     * Returns true if the given class, its parent classes or trait of their traits have the given trait.
     *
     * @param Object|string $trait
     * @param object|string $class
     * @return bool
     */
    function has_trait(object|string $trait, object|string $class): bool
    {
        if (!class_exists($class))
            return false;

        $traits = class_uses_recursive($class);

        return in_array($trait, $traits);
    }
}

if (!function_exists('has_interface')) {

    /**
     * Returns true if the given class, its parent classes or trait of their traits have the given trait.
     *
     * @param Object|string $interface
     * @param object|string $class
     * @return bool
     */
    function has_interface(object|string $interface, object|string $class): bool
    {
        return is_a($class, $interface, true);
    }
}
