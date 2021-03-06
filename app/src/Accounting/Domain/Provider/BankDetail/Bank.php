<?php

namespace Misa\Accounting\Domain\Provider\BankDetail;

use MisaSdk\Common\Entity\AbstractEntity;
use MisaSdk\Common\Entity\MisaToArray;

/**
 * Bank Class
 *
 * @package Misa\Accounting\Domain\Provider\BankDetail
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class Bank extends AbstractEntity implements MisaToArray
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

    /**
     * @return string
     */
    public function id()
    {
        return $this->id;
    }

    public function name()
    {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
