<?php

namespace Misa\Accounting\Domain\Provider\BankDetail;

use MisaSdk\Common\Entity\AbstractEntity;

/**
 * Bank Class
 *
 * @package Misa\Accounting\Domain\Provider\BankDetail
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class Bank extends AbstractEntity
{
    /** @var string */
    private $id;

    /** @var string */
    private $name;

    public static function create($name, $id = self::EMPTY_ID)
    {
        $bank = new self();
        $bank->id = self::uuid($id)->getId();
        $bank->name = $name;
        return $bank;
    }
}
