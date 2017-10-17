<?php

namespace Misa\Accounting\Domain\Provider\BankDetail;

use MisaSdk\Common\Enum\AbstractEnum;

/**
 * AccountType Class
 *
 * @package Misa\Accounting\Domain\Provider\BankDetail
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class AccountType extends AbstractEnum
{
    const CURRENT = 1;
    const SAVING = 2;
}
