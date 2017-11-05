<?php

namespace Misa\Accounting\Presentation\Provider;

use Misa\Accounting\Domain\Product\Item;
use Misa\Accounting\Domain\Product\Product;
use Misa\Accounting\Domain\Provider\BankDetail\Bank;
use MisaSdk\Common\Entity\CollectionToArray;

/**
 * ListPresentation Class
 *
 * @package Misa\Accounting\Presentation\Provider
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class ListPresentation
{
    use CollectionToArray;

    /**
     * @param Item[] $items
     * @param Product[] $products
     * @param Bank[] $banks
     * @param $phones
     * @return array
     */
    public function formData($items, $products, $banks, $phones)
    {
        return [
            'phones' => $phones,
            'items' => $this->collectionToArray($items),
            'products' => $this->collectionToArray($products),
            'banks' => $this->collectionToArray($banks),
        ];
    }
}
