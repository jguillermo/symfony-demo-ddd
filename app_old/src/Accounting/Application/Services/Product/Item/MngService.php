<?php

namespace Misa\Accounting\Application\Services\Product\Item;

use Misa\Accounting\Application\Input\Product\ItemInput;
use Misa\Accounting\Domain\Product\Item;
use Misa\Accounting\Domain\Product\ItemRepository;
use MisaSdk\Common\Exception\BadRequest;

/**
 * MngService Class
 *
 * @package Misa\Accounting\Application\Services\Product\Item
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class MngService
{
    /** @var ItemRepository */
    private $itemRepository;

    public function __construct(ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }


    public function create(ItemInput $itemInput)
    {
        $item = Item::create($itemInput->description(), $itemInput->code());
        $this->itemRepository->persist($item);

        return $item->id();
    }

    public function update(ItemInput $itemInput, $itemId)
    {
        $item = $this->itemRepository->getById($itemId);
        if (! $item) {
            throw new BadRequest("No existe el Item con el id : ".$itemId);
        }

        if (! is_null($itemInput->code())) {
            $item->changeCode($itemInput->code());
        }
        if (! is_null($itemInput->description())) {
            $item->changeDescription($itemInput->description());
        }

        $this->itemRepository->persist($item);
    }

    public function remove($itemId)
    {
        $item = $this->itemRepository->getById($itemId);
        if (! $item) {
            throw new BadRequest("No existe el Item con el id : ".$itemId);
        }
        $this->itemRepository->remove($item);
    }
}
