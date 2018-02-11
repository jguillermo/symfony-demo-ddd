<?php

namespace Misa\Accounting\Domain\Payment;

use MisaSdk\Common\Entity\AbstractEntity;

/**
 * Type Class
 *
 * @package Misa\Accounting\Domain\Payment
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2018, Getmin
 */
class Type extends AbstractEntity
{
    /** @var string */
    private $id;

    /** @var string */
    private $description;

    public static function create(string $description, string $id = self::EMPTY_ID)
    {
        $documentType = new self();
        $documentType->id = self::uuid($id)->getId();
        $documentType->description = $description;
        return $documentType;
    }
}
