<?php

namespace Misa\Accounting\Application\Input\Product;

use MisaSdk\Common\Input\AbstractInput;
use MisaSdk\Common\Validation\MisaAssertion;

/**
 * ProductInput Class
 *
 * @package Misa\Accounting\Application\Input\Product
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 *
 * @method string name()
 * @method string itemId()
 */
class ProductInput extends AbstractInput
{

    protected $name;

    protected $itemId;

    public function __construct($name, $itemId, $createValidate = true)
    {
        $this->name = $name;
        $this->itemId = $itemId;
        $this->createValidate = $createValidate;
        $this->validate();
    }

    protected function validate()
    {
        $assert = new MisaAssertion();

        if ($this->mustValidate($this->name)) {
            $assert::minLength($this->name, 2, "El nombre debe tener al menos 2 caracteres");
        }

        if ($this->mustValidate($this->itemId)) {
            $assert::uuid($this->itemId, "Error rubro Id : No es id valido");
        }
    }
}
