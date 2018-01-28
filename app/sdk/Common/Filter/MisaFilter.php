<?php

namespace MisaSdk\Common\Filter;

use BadMethodCallException;
use DateTime;
use MisaSdk\Util\Dates;
use MisaSdk\Util\MisaString;

/**
 * MisaFilter Class
 *
 * @package MisaSdk\Common\Filter
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2018, Getmin
 *
 * @method static null|bool nullOrBool(string $value)
 * @method static null|float nullOrFloat(string $value, int $round = 2)
 * @method static null|float nullOrCurrent(string $value, int $round = 2)
 * @method static null|int nullOrInt(string $value)
 * @method static null|string nullOrTrim(string $value)
 * @method static null|string nullOrDate(string $value)
 *
 */
class MisaFilter
{

    public static function bool($value): bool
    {
        $yesList = [
            'on',
            '1',
            'true',
        ];

        $noList = [
            'off',
            '0',
            'false',
        ];

        $value = MisaString::lower($value);

        if (in_array($value, $yesList) || self::float($value) !== 0.0) {
            return true;
        }

        if (in_array($value, $noList)) {
            return false;
        }

        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    public static function float($value, $round = 2): float
    {
        $matches = self::floatMatch($value);

        $result = $matches[0] ?? 0.0;

        $result = round($result, $round);

        return (float)$result;
    }

    public static function current($value, $round = 2): float
    {

        $matches = self::floatMatch($value);

        $result = $matches[0] ?? -1.0;

        $result = ($result < 0) ? -1.0 : $result;
        $result = round($result, $round);

        return (float)$result;
    }

    private static function floatMatch($value)
    {
        $cleaned = preg_replace('#[^\deE\-\.\,]#iu', '', $value);
        $cleaned = str_replace(',', '.', $cleaned);

        preg_match('#[-+]?[\d]+(\.[\d]+)?([eE][-+]?[\d]+)?#', $cleaned, $matches);
        return $matches;
    }

    public static function int($value): int
    {
        $cleaned = preg_replace('#[^0-9-+.,]#', '', $value);
        preg_match('#[-+]?[\d]+#', $cleaned, $matches);
        $result = $matches[0] ?? 0;

        return (int)$result;
    }

    public static function trim($value): string
    {
        return MisaString::trim($value);
    }


    public static function date($value) : DateTime
    {
        $value = trim($value);
        if (! Dates::isDateValid($value)) {
            return new DateTime(Dates::SQL_NULL);
        }

        if (! Dates::is($value)) {
            return new DateTime(Dates::SQL_NULL);
        }
        return Dates::factory($value);
    }

    /**
     * static call handler to implement:
     *  - "null or assertion" delegation
     *  - "all" delegation.
     *
     * @param string $method
     * @param array  $args
     *
     * @return bool|mixed
     */
    public static function __callStatic($method, $args)
    {
        if (0 === \strpos($method, 'nullOr')) {
            if (! \array_key_exists(0, $args)) {
                throw new BadMethodCallException('Missing the first argument.');
            }

            if (null === $args[0]) {
                return null;
            }

            $method = \substr($method, 6);

            return \call_user_func_array([\get_called_class(), $method], $args);
        }

        throw new BadMethodCallException('No Filter #' . $method . ' exists.');
    }
}
