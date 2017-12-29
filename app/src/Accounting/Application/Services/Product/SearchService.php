<?php

namespace Misa\Accounting\Application\Services\Product;

use Misa\Accounting\Domain\Product\ProductSearchRepository;
use MisaSdk\Common\Exception\BadRequest;

/**
 * SearchService Class
 *
 * @package Misa\Accounting\Application\Services\Product
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class SearchService
{
    /** @var ProductSearchRepository */
    private $productSearchRepository;

    public function __construct(ProductSearchRepository $productSearchRepository)
    {
        $this->productSearchRepository = $productSearchRepository;
    }

    /**
     * @param $q
     * @return array
     * @throws BadRequest
     */
    public function freeSearch($q)
    {
        if (empty($q)) {
            return [];
        }
        if (! is_scalar($q)) {
            throw new BadRequest("El parámetro a buscar debe ser alfa numérico");
        }
        return $this->productSearchRepository->find(trim($q));
    }
}
