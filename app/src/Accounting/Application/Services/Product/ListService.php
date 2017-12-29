<?php

namespace Misa\Accounting\Application\Services\Product;

use Misa\Accounting\Domain\Product\ProductRepository;
use Misa\Accounting\Presentation\Product\ListPresentation as ProductListPresentation;
use MisaSdk\Common\Exception\BadRequest;

/**
 * ListService Class
 *
 * @package Misa\Accounting\Application\Services\Product
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class ListService
{
    /** @var ProductRepository */
    private $productRepository;

    /** @var ProductListPresentation */
    private $productListPresentation;


    public function __construct(ProductRepository $productRepository, ProductListPresentation $productListPresentation)
    {
        $this->productRepository = $productRepository;
        $this->productListPresentation = $productListPresentation;
    }


    public function getById($productId)
    {
        $product = $this->productRepository->findById($productId);
        if (! $product) {
            throw new BadRequest("No existe el producto con el id:".$productId);
        }

        return $this->productListPresentation->serializerEncode($product);
    }
}
