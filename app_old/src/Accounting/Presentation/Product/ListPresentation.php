<?php

namespace Misa\Accounting\Presentation\Product;

use Misa\Accounting\Domain\Product\Product;

/**
 * ListPresentation Class
 *
 * @package Misa\Accounting\Presentation\Provider
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class ListPresentation
{

    public function serializerEncode(Product $product)
    {
        return [
            'id' => $product->id(),
            'name' => $product->name(),
            'item_id' => $product->item()->id(),
            'item_code' => $product->item()->code(),
            'item_description' => $product->item()->description(),
        ];
    }
}
