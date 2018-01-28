<?php

namespace Misa\Accounting\Application\Services\Payment\Input;

use DateTime;
use Misa\Accounting\Domain\Payment\AmountType;
use MisaSdk\Common\Filter\MisaFilter;
use MisaSdk\Common\Input\AbstractInput;
use MisaSdk\Common\Validation\MisaAssertion;

/**
 * InputPayment Class
 *
 * @package Misa\Accounting\Application\Services\Payment\Input
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2018, Getmin
 *
 * @method string productId()
 * @method DateTime paidAt()
 * @method string documentTypeId()
 * @method string documentNumber()
 * @method int documentStatus()
 * @method string typeId()
 * @method float amount()
 * @method int amountType()
 */
class InputPayment extends AbstractInput
{
    /** @var string */
    protected $productId;

    /** @var DateTime */
    protected $paidAt;

    /** @var string */
    protected $documentTypeId;

    /** @var string */
    protected $documentNumber;

    /** @var int */
    protected $documentStatus;

    /** @var string */
    protected $typeId;

    /** @var float */
    protected $amount;

    /** @var int */
    protected $amountType;

    public function __construct(
        $productId,
        $paidAt,
        $documentTypeId,
        $documentNumber,
        $documentStatus,
        $typeId,
        $amount,
        $amountType,
        bool $createValidate = true
    ) {
        parent::__construct($createValidate);

        $this->productId = MisaFilter::nullOrTrim($productId);
        $this->paidAt = MisaFilter::nullOrDate($paidAt);
        $this->documentTypeId = MisaFilter::nullOrTrim($documentTypeId);
        $this->documentNumber = MisaFilter::nullOrTrim($documentNumber);
        $this->documentStatus = MisaFilter::nullOrInt($documentStatus);
        $this->typeId = MisaFilter::nullOrTrim($typeId);
        $this->amount = MisaFilter::nullOrCurrent($amount);
        $this->amountType = MisaFilter::nullOrInt($amountType);
        $this->validate();
    }


    protected function validate()
    {
        $assert = new MisaAssertion();

        if ($this->mustValidate($this->productId)) {
            $assert::misaId($this->productId, 'Product');
        }

        if ($this->mustValidate($this->paidAt)) {
            $assert::notNull($this->paidAt, 'Ingresar la fecha de pago');
            $assert::misaDate($this->paidAt, 'de pago');
        }

        if ($this->mustValidate($this->documentTypeId)) {
            $assert::misaId($this->documentTypeId, 'Tipo de Documento');
        }

        if ($this->mustValidate($this->documentNumber)) {
            $assert::notNull($this->documentNumber, 'Ingresar el número de documento');
            $assert::minLength($this->documentNumber, 1, 'Ingresar al menos 1 número de documento');
        }

        if ($this->mustValidate($this->typeId)) {
            $assert::misaId($this->typeId, 'Tipo de Pago');
        }

        if ($this->mustValidate($this->amount)) {
            $assert::notNull($this->amount, 'Ingresar el monto del pago');
            $assert::misaCurrent($this->amount, 'Error: ingresar un monto válido');
        }
        if ($this->mustValidate($this->amountType)) {
            $assert::notNull($this->amountType, 'Ingrese el tipo de monto');
            $assert::misaEnum($this->amountType, new AmountType(), 'al tipo de monto');
        }
    }
}
