<?php

namespace MisaSdk\Util;

/**
 * MisaString Class
 *
 * @package MisaSdk\Util
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2018, Getmin
 */
class MisaString
{
    public static $encoding = 'UTF-8';

    public static function lower($string): string
    {
        return mb_strtolower($string, self::$encoding);
    }

    public static function trim($value, $extendMode = false): string
    {
        $result = (string)trim($value);

        if ($extendMode) {
            $result = trim($result, chr(0xE3) . chr(0x80) . chr(0x80));
            $result = trim($result, chr(0xC2) . chr(0xA0));
            $result = trim($result);
        }

        return $result;
    }
}
