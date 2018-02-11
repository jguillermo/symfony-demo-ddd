<?php

namespace Misa\Accounting\Domain\Payment;

use DateTime;
use Misa\Accounting\Domain\Product\Product;
use MisaSdk\Common\Entity\AbstractEntity;
use MisaSdk\Common\Exception\BadRequest;

/**
 * Payment Class
 *
 * @package Misa\Accounting\Domain\Payment
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2018, Getmin
 */
class Payment extends AbstractEntity
{
    /** @var string */
    private $id;

    /** @var Product */
    private $product;

    /** @var DateTime */
    private $paidAt;

    /** @var DocumentType */
    private $documentType;

    /** @var string */
    private $documentNumber;

    /** @var int */
    private $documentStatus;

    /** @var Type */
    private $type;

    /** @var float */
    private $amount;

    /** @var int */
    private $amountType;

    /** @var string */
    private $userId;

    public static function create(
        Product $product,
        DateTime $paidAt,
        DocumentType $documentType,
        string $documentNumber,
        Type $type,
        float $amount,
        int $amountType,
        string $userId,
        string $id = self::EMPTY_ID
    ) : Payment {

        $payment = new self();
        $payment->id = self::uuid($id)->getId();
        $payment->product = $product;
        $payment->paidAt = $paidAt;
        $payment->documentType = $documentType;
        $payment->documentNumber = $documentNumber;
        $payment->changeDocumentStatus(DocumentStatus::PICKUP);
        $payment->type = $type;
        $payment->amount = $amount;
        $payment->userId = $userId;
        $payment->changeAmountType($amountType);

        return $payment;
    }

    public function changeDocumentStatus(int $documentStatus)
    {
        if (! DocumentStatus::isValidValue($documentStatus)) {
            throw new BadRequest("Tipo de documento no válido");
        }
        $this->documentStatus = $documentStatus;
    }

    public function changeAmountType(int $amountType)
    {
        if (! AmountType::isValidValue($amountType)) {
            throw new BadRequest("Tipo de monto no válido");
        }
        $this->amountType = $amountType;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function product(): Product
    {
        return $this->product;
    }

    public function amount(): float
    {
        return $this->amount;
    }

    public function amountType(): int
    {
        return $this->amountType;
    }
}
