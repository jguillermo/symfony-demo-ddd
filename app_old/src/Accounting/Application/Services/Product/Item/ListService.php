<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 30/12/17
 * Time: 06:57 PM
 */

namespace Misa\Accounting\Application\Services\Product\Item;

use Misa\Accounting\Domain\Product\ItemRepository;
use Misa\Accounting\Presentation\Product\ItemPresentation;
use MisaSdk\Common\Exception\BadRequest;

class ListService
{
    /** @var ItemRepository */
    private $itemRepository;

    /** @var ItemPresentation */
    private $itemPresentation;

    /**
     * ListService constructor.
     * @param ItemRepository $itemRepository
     * @param ItemPresentation $itemPresentation
     */
    public function __construct(ItemRepository $itemRepository, ItemPresentation $itemPresentation)
    {
        $this->itemRepository = $itemRepository;
        $this->itemPresentation = $itemPresentation;
    }


    public function getById($itemId)
    {
        $item = $this->itemRepository->getById($itemId);
        if (! $item) {
            throw new BadRequest("No existe el Rubro con el id:".$itemId);
        }

        return $this->itemPresentation->serializerEncode($item);
    }
}
