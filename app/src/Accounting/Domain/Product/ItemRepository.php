<?php

namespace Misa\Accounting\Domain\Product;

/**
 * ItemRepository Interface
 *
 * @package Misa\Accounting\Domain\Product
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
interface ItemRepository
{
    /**
     * @param $itemId
     * @return Item
     */
    public function getById($itemId);

    /**
     * @return Item[]
     */
    public function findAll();

    /**
     * @param Item $item
     * @return bool
     */
    public function persist(Item $item);

    /**
     * @param Item $item
     * @return bool
     */
    public function remove(Item $item);
}
