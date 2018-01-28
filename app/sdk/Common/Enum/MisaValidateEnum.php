<?php

namespace MisaSdk\Common\Enum;

/**
 * MisaValidateEnum Interface
 *
 * @package MisaSdk\Common\Enum
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2018, Getmin
 */
interface MisaValidateEnum
{
    /**
     * @param $value
     * @param bool $strict
     * @return bool
     */
    public static function isValidValue($value, $strict = true);
}
