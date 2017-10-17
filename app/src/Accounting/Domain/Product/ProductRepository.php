<?php

namespace Misa\Accounting\Domain\Product;

/**
 * ProductRepository Interface
 *
 * @package Misa\Accounting\Domain\Product
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
interface ProductRepository
{
    /**
     * @param $productId
     * @return Product
     */
    public function findById($productId);
}
