<?php

namespace Misa\Accounting\Domain\Provider\BankDetail;

use MisaSdk\Common\Enum\AbstractEnum;

/**
 * AccountMoney Class
 *
 * @package Misa\Accounting\Domain\Provider\BankDetail
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class AccountMoney extends AbstractEnum
{
    const DOLLAR = 1;
    const SOLES = 2;
}
