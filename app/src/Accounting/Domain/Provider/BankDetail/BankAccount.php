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


    public static function create(
        Provider $provider,
        $type,
        $money,
        $holderName,
        Bank $bank,
        AccountNumber
        $number,
        $id = self::EMPTY_ID
    ) {
        $bankAccount = new self();

        $bankAccount->id = self::uuid($id)->getId();
        $bankAccount->changeType($type);
        $bankAccount->changeMoney($money);
        $bankAccount->holderName = $holderName;
        $bankAccount->bank = $bank;
        $bankAccount->number = $number;
        $bankAccount->provider = $provider;

        return $bankAccount;
    }

    public function id()
    {
        return $this->id;
    }

    public function type()
    {
        return $this->type;
    }

    public function money()
    {
        return $this->money;
    }

    public function holderName()
    {
        return $this->holderName;
    }

    public function bank()
    {
        return $this->bank;
    }

    public function number()
    {
        return $this->number;
    }

    public function changeHolderName($holderName)
    {
        $this->holderName = $holderName;
    }

    public function changeBank(Bank $bank)
    {
        $this->bank = $bank;
    }

    public function changeNumber(AccountNumber $number)
    {
        $this->number = $number;
    }


    public function changeType($type)
    {
        if (! AccountType::isValidValue($type)) {
            throw new BadRequest("El tipo de cuenta no es corecta");
        }
        $this->type = $type;
    }

    public function changeMoney($money)
    {
        if (! AccountMoney::isValidValue($money)) {
            throw new BadRequest("El tipo de moneda no es corecta");
        }
        $this->money = $money;
    }
}
