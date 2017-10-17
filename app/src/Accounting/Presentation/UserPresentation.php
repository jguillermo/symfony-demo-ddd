<?php

namespace Misa\Accounting\Presentation;

use Misa\Accounting\Domain\User;

/**
 * UserPresentation Class
 *
 * @package Misa\Accounting\Presentation
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class UserPresentation
{
    /**
     * @param User $user
     * @return array
     */
    public function getById(User $user)
    {
        return [
            "id" => $user->id(),
            "name" => $user->name(),
            "last_name" => $user->lastName(),
            "second_last_name" => $user->secondLastName()
        ];
    }
}
