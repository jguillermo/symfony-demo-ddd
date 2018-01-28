<?php

namespace Misa\Accounting\Application\Input\Provider;

use MisaSdk\Common\Input\AbstractInput;

/**
 * PhoneInput Class
 *
 * @package Misa\Accounting\Application\Input\Provider
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 *
 * @method string number()
 * @method int type()
 */
class PhoneInput extends AbstractInput
{
    /** @var string */
    protected $number;

    /** @var int */
    protected $type;

    /**
     * PhoneInput constructor.
     * @param string $number
     * @param int $type
     */
    public function __construct($number, $type)
    {
        $this->number = $number;
        $this->type = $type;
    }

    protected function validate()
    {
        // TODO: Implement validate() method.
    }
}
