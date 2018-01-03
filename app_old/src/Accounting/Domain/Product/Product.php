<?php

namespace Misa\Accounting\Domain\Product;

use MisaSdk\Common\Entity\AbstractEntity;
use MisaSdk\Common\Entity\MisaToArray;

/**
 * Product Class
 *
 * @package Misa\Accounting\Domain\Product
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class Product extends AbstractEntity implements MisaToArray
{
    /** @var string */
    private $id;

    /** @var string */
    private $name;

    /** @var Item */
    private $item;

    /**
     * @param $name
     * @param Item $item
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

    public function id()
    {
        return $this->id;
    }

    public function name()
    {
        return $this->name;
    }

    public function item()
    {
        return $this->item;
    }

    public function changeName($name)
    {
        $this->name = $name;
    }

    public function changeItem(Item $item)
    {
        $this->item = $item;
    }



    /**
     * @inheritdoc
     */
    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }
}
