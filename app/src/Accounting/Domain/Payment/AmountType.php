<?php

namespace Misa\Accounting\Domain\Payment;

use MisaSdk\Common\Enum\AbstractEnum;

/**
 * AmountType Class
 *
 * @package Misa\Accounting\Domain\Payment
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2018, Getmin
 */
class AmountType extends AbstractEnum
{
    const DOLLAR = 1;
    const SOLES = 2;

    public static function label()
    {
        return [
            'DOLLAR' => 'Dólares',
            'SOLES' => 'Soles',
        ];
    }
}
