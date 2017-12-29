<?php

namespace Misa\Accounting\Application\Event\Product;

use Misa\Accounting\Domain\Product\Product;
use Misa\Accounting\Domain\Product\ProductSearchRepository;
use MisaSdk\Common\Exception\AppException;
use MisaSdk\Common\Exception\SrvErrorException;

/**
 * MngEvent Class
 *
 * @package Misa\Accounting\Application\Event\Company
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class MngEvent
{
    /** @var ProductSearchRepository */
    private $productSearchRepository;

    public function __construct(ProductSearchRepository $productSearchRepository)
    {
        $this->productSearchRepository = $productSearchRepository;
    }

    public function persist(Product $product)
    {
        try {
            $this->productSearchRepository->index($product);
        } catch (AppException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw new SrvErrorException("No se pudo indexar la data");
        }
    }
}
