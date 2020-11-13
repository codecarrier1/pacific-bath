<?php

namespace App\Helpers;

/**
 * A helper class for math functions
 *
 * @author Eric Percifield <medalink7@gmail.com>
 */
class Math
{
    /**
     * Divide without errors
     *
     * @param float|int|null $dividend
     * @param float|int|null $divisor
     * @param float|int|string|null $customReturnValue
     * @return float|int|null
     */
    public static function divide($dividend, $divisor, $customReturnValue = null)
    {
        if (empty($divisor)) {
            return $customReturnValue;
        }

        if (empty($dividend)) {
            return $customReturnValue;
        }

        return $dividend / $divisor;
    }

    public static function getOptionalDecimal($numberAsString)
    {
        $decimal = floatval($numberAsString);
        $integer = intval($decimal);
        // Important to use == and not === here
        if($decimal == $integer){
            return $integer;
        }
        return $decimal;
    }
}
