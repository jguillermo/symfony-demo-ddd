<?php

namespace Misa\Accounting\Domain\Payment;

use MisaSdk\Common\Enum\AbstractEnum;

/**
 * DocumentStatus Class
 *
 * @package Misa\Accounting\Domain\Payment
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2018, Getmin
 */
class DocumentStatus extends AbstractEnum
{
    const PICKUP = 1;

    public static function label()
    {
        return [
            'PICKUP' => 'ya se recogió',
        ];
    }
}
