<?php

namespace Misa\Accounting\Application\Input\Product;

use MisaSdk\Common\Input\AbstractInput;
use MisaSdk\Common\Validation\MisaAssertion;

/**
 * BankAccountInput Class
 *
 * @package Misa\Accounting\Application\Input\Provider
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 *
 * @method string description()
 * @method string code()
 */
class ItemInput extends AbstractInput
{

    /** @var string */
    protected $description;

    /** @var string */
    protected $code;

    public function __construct($description, $code, $createValidate = true)
    {
        $this->description = $description;
        $this->code = $code;
        $this->createValidate = $createValidate;
        $this->validate();
    }

    protected function validate()
    {
        $assert = new MisaAssertion();

        if ($this->mustValidate($this->description)) {
            $assert::minLength($this->description, 2, "La descripcion debe tener al menos 2 caracteres");
        }

        if ($this->mustValidate($this->code)) {
            $assert::minLength($this->code, 2, "El código debe tener al menos 2 caracteres");
        }
    }
}
