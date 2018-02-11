<?php

namespace Misa\Accounting\Application\Input\Provider;

use MisaSdk\Common\Input\AbstractInput;

/**
 * BankAccountInput Class
 *
 * @package Misa\Accounting\Application\Input\Provider
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 *
 * @method string type()
 * @method string money()
 * @method string holderName()
 * @method string bankId()
 * @method string number()
 * @method string numberInterbank()
 */
class BankAccountInput extends AbstractInput
{
    /** @var int */
    protected $type;

    /** @var int */
    protected $money;

    /** @var string */
    protected $holderName;

    /** @var string */
    protected $bankId;

    /** @var string */
    protected $number;

    /** @var string */
    protected $numberInterbank;

    /**
     * BankAccountInput constructor.
     * @param int $type
     * @param int $money
     * @param string $holderName
     * @param string $bankId
     * @param string $number
     * @param string $numberInterbank
     */
    public function __construct($type, $money, $holderName, $bankId, $number, $numberInterbank)
    {
        $this->type = $type;
        $this->money = $money;
        $this->holderName = $holderName;
        $this->bankId = $bankId;
        $this->number = $number;
        $this->numberInterbank = $numberInterbank;
    }

    protected function validate()
    {
        // TODO: Implement validate() method.
    }
}
