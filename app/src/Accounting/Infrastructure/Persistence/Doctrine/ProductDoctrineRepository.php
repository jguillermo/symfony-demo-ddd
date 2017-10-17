<?php

namespace Misa\Accounting\Infrastructure\Persistence\Doctrine;

use Misa\Accounting\Domain\Product\Product;
use Misa\Accounting\Domain\Product\ProductRepository;
use MisaSdk\Common\Adapter\Persistence\Doctrine\DoctrineRepository;

/**
 * ProductRepository Class
 *
 * @package Misa\Accounting\Infrastructure\Persistence\Doctrine
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class ProductDoctrineRepository extends DoctrineRepository implements ProductRepository
{

    /**
     * @param $productId
     * @return Product
     */
    public function findById($productId)
    {
        // TODO: Implement findById() method.
    }
}
