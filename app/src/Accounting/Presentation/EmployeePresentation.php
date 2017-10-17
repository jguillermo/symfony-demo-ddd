<?php

namespace Misa\Accounting\Presentation;

use Misa\Accounting\Domain\Employee\Employee;
use Misa\Accounting\Domain\Employee\EmployeeRole;

/**
 * EmployeePresentation Class
 *
 * @package Misa\Accounting\Presentation
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class EmployeePresentation
{
    /**
     * @param Employee $employee
     * @return array
     */
    public function getById(Employee $employee)
    {
        return [
            'id' => $employee->user()->id(),
            'name' => $employee->user()->name(),
            'last_name' => $employee->user()->lastName(),
            'role' => EmployeeRole::getLabel($employee->role())
        ];
    }
}
