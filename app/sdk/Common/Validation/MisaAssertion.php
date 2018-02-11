<?php

namespace MisaSdk\Common\Validation;

use Assert\Assertion as BeberleiAssertion;
use DateTime;
use MisaSdk\Common\Enum\MisaValidateEnum;

/**
 * Assertion Class
 *
 * @package MisaSdk\Common\Validation
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class MisaAssertion extends BeberleiAssertion
{
    static protected $exceptionClass = 'MisaSdk\Common\Exception\BadRequest';

    /**
     * @param $value
     * @param string $entityName
     * @return bool
     * @throws \Assert\AssertionFailedException
     */
    public static function misaId($value, $entityName)
    {
        return self::uuid($value, "Error {$entityName} Id : No es id válido");
    }

    /**
     * @param $value
     * @return bool
     * @throws \Assert\AssertionFailedException
     */
    public static function misaDate(DateTime $value, $message = "")
    {
        if ($value->format('Y') == "-0001") {
            $message = "Error: la fecha {$message} no es válida";
            throw static::createException($value->format('Y'), $message, static::INVALID_DATE, null);
        }
        return true;
    }

    /**
     * @param $value
     * @return bool
     * @throws \Assert\AssertionFailedException
     */
    public static function misaCurrent(float $value)
    {
        if ($value < 0) {
            $message = "Error: ingresar un monto válido";
            throw static::createException($value, $message, static::INVALID_FLOAT, null);
        }
        return true;
    }

    /**
     * @param $value
     * @param MisaValidateEnum $enum
     * @param string $message
     * @return bool
     */
    public static function misaEnum($value, MisaValidateEnum $enum, $message = "")
    {
        if (! $enum::isValidValue($value)) {
            $message = trim("Error: ingresar un valor válido {$message}");
            throw static::createException($value, $message, static::INVALID_DIGIT, null);
        }
        return true;
    }
}
