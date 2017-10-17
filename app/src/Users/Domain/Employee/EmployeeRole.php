<?php

namespace Misa\Accounting\Domain\Employee;

use Misa\Common\Util\AbstractEnum;

/**
 * EmployeeRole Class
 *
 * @package Misa\Accounting\Domain\Enum
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class EmployeeRole extends AbstractEnum
{
    const ADMIN = 1;
    const COMMON = 2;

    public static function label()
    {
        return [
            'ADMIN' => 'Admin',
            'COMMON' => 'Commún',
        ];
    }
}
