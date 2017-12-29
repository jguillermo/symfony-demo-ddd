<?php

namespace Misa\Accounting\Domain\Product;

/**
 * ProductSearchRepository Interface
 *
 * @package Misa\Accounting\Domain\Product
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
interface ProductSearchRepository
{
    /**
     * @param $q
     * @return array
     */
    public function find($q);

    /**
     * @param Product $provider
     * @return bool
     */
    public function index(Product $provider);
}
