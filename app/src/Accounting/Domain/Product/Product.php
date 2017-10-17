<?php

namespace Misa\Accounting\Domain\Product;

use MisaSdk\Common\Entity\AbstractEntity;

/**
 * Product Class
 *
 * @package Misa\Accounting\Domain\Product
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class Product extends AbstractEntity
{
    /** @var string */
    private $id;

    /** @var string */
    private $name;

    /** @var Item */
    private $item;

    /**
     * @param $name
     * @param string $id
     * @return Product
     */
    public static function create($name, Item $item, $id = self::EMPTY_ID)
    {
        $product = new self();
        $product->name = $name;
        $product->item = $item;
        $product->id = self::uuid($id)->getId();
        return $product;
    }
}
