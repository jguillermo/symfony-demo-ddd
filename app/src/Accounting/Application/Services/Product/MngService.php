<?php

namespace Misa\Accounting\Application\Services\Product;

use Misa\Accounting\Application\Event\Product\MngEvent as ProductMngEvent;
use Misa\Accounting\Application\Input\Product\ProductInput;
use Misa\Accounting\Domain\Product\ItemRepository;
use Misa\Accounting\Domain\Product\Product;
use Misa\Accounting\Domain\Product\ProductRepository;
use MisaSdk\Common\Exception\BadRequest;

/**
 * MngService Class
 *
 * @package Misa\Accounting\Application\Services\Product
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class MngService
{
    /** @var ProductRepository */
    private $productRepository;

    /** @var ItemRepository */
    private $itemRepository;

    /** @var ProductMngEvent */
    private $productMngEvent;

    public function __construct(
        ProductRepository $productRepository,
        ItemRepository $itemRepository,
        ProductMngEvent $productMngEvent
    ) {
        $this->productRepository = $productRepository;
        $this->itemRepository = $itemRepository;
        $this->productMngEvent = $productMngEvent;
    }


    public function create(ProductInput $productInput)
    {
        $item = $this->itemRepository->getById($productInput->itemId());
        if (! $item) {
            throw new BadRequest("No existe el Rubro con ID ".$productInput->itemId());
        }

        $product = Product::create($productInput->name(), $item);
        $this->productRepository->persist($product);

        $this->productMngEvent->persist($product);
        return $product->id();
    }

    public function update(ProductInput $productInput, $productId)
    {
        $product = $this->productRepository->findById($productId);
        if (! $product) {
            throw new BadRequest("No existe el Producto con el id : ".$productId);
        }

        if (! is_null($productInput->name())) {
            $product->changeName($productInput->name());
        }
        if (! is_null($productInput->itemId())) {
            $item = $this->itemRepository->getById($productInput->itemId());
            if (! $item) {
                throw new BadRequest("No existe el Rubro con ID ".$productInput->itemId());
            }
            $product->changeItem($item);
        }

        $this->productRepository->persist($product);
        $this->productMngEvent->persist($product);
        return true;
    }

    public function remove($productId)
    {
        $product = $this->productRepository->findById($productId);
        if (! $product) {
            throw new BadRequest("No existe el Item con el id : ".$productId);
        }
        $this->productRepository->remove($product);
    }
}
