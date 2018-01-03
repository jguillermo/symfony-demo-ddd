<?php

namespace Misa\Accounting\Domain\Provider\BankDetail;

/**
 * AccountNumber Class
 *
 * @package Misa\Accounting\Domain\Provider\BankDetail
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class AccountNumber
{
    /** @var string */
    private $number;

    /** @var string */
    private $interbank;

    /**
     * @param $number
     * @param $interbank
     * @return AccountNumber
     */
    public static function create($number, $interbank)
    {
        $accountNumber = new self();
        $accountNumber->number = $number;
        $accountNumber->interbank = $interbank;
        return $accountNumber;
    }

    public function number()
    {
        return $this->number;
    }

    public function interbank()
    {
        return $this->interbank;
    }

    public function changeNumber($number)
    {
        $this->number = $number;
    }

    public function changeInterbank($interbank)
    {
        $this->interbank = $interbank;
    }




    /** todo: aqui debe estar la validadcion del numero de cuenta */
}
