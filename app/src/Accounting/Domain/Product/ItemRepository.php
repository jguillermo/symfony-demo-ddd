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
     * @return Item[]
     */
    public function findAll();
}
