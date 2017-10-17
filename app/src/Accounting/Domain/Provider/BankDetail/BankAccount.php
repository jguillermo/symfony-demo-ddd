<?php

namespace Misa\Accounting\Domain\Provider\BankDetail;

use Misa\Accounting\Domain\Provider\Provider;
use MisaSdk\Common\Entity\AbstractEntity;
use MisaSdk\Common\Exception\BadRequest;

/**
 * BankAccount Class
 *
 * @package Misa\Accounting\Domain\Provider\BankDetail
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class BankAccount extends AbstractEntity
{
    /** @var string */
    private $id;

    /** @var int */
    private $type;

    /** @var int */
    private $money;

    /** @var string */
    private $holderName;

    /** @var Bank */
    private $bank;

    /** @var AccountNumber */
    private $number;

    /** @var Provider */
    private $provider;

    /**
     * @param $type
     * @param $money
     * @param $holderName
     * @param Bank $bank
     * @param AccountNumber $number
     * @param string $id
     * @return BankAccount
     */
    public static function create($type, $money, $holderName, Bank $bank, AccountNumber $number, $id = '')
    {
        $bankAccount = new self();
        $bankAccount->validate($type, $money);

        $bankAccount->id = self::uuid($id)->getId();
        $bankAccount->type = $type;
        $bankAccount->money = $money;
        $bankAccount->holderName = $holderName;
        $bankAccount->bank = $bank;
        $bankAccount->number = $number;

        return $bankAccount;
    }

    private function validate($type, $money)
    {
        if (! AccountType::isValidKey($type)) {
            throw new BadRequest("El tipo de cuenta no es corecta");
        }

        if (! AccountMoney::isValidKey($money)) {
            throw new BadRequest("El tipo de moneda no es corecta");
        }
    }
}
