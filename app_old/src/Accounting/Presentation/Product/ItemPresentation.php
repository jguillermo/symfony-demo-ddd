<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 30/12/17
 * Time: 06:56 PM
 */

namespace Misa\Accounting\Presentation\Product;

use Misa\Accounting\Domain\Product\Item;

class ItemPresentation
{
    public function serializerEncode(Item $item)
    {
        return [
            'id' => $item->id(),
            'code' => $item->code(),
            'description' => $item->description(),
        ];
    }
}
