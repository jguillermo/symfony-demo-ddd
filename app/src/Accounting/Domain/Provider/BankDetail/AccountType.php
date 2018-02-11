<?php

namespace Misa\Accounting\Domain\Provider\BankDetail;

use MisaSdk\Common\Enum\AbstractEnum;
use MisaSdk\Common\Enum\MisaLabelEnum;

/**
 * AccountType Class
 *
 * @package Misa\Accounting\Domain\Provider\BankDetail
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class AccountType extends AbstractEnum implements MisaLabelEnum
{
    const CURRENT = 1;
    const SAVING = 2;

    public static function label()
    {
        return [
            'CURRENT' => 'Cuenta Corriente',
            'SAVING' => 'Cuenta de Ahorros',
        ];
    }
}
