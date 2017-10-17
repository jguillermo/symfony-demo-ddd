<?php

namespace Misa\Accounting\Domain\Product;

use MisaSdk\Common\Entity\AbstractEntity;

/**
 * Item Class
 *
 * @package Misa\Accounting\Domain\Product
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class Item extends AbstractEntity
{
    /** @var string */
    private $id;

    /** @var string */
    private $description;

    /** @var string */
    private $code;

    public static function create($description, $code, $id = self::EMPTY_ID)
    {
        $item = new self();
        $item->id = self::uuid($id)->getId();
        $item->code = $code;
        $item->description = $description;
        return $item;
    }
}
