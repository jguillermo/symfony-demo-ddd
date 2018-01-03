<?php

namespace Misa\Accounting\Application\Input\Provider;

use MisaSdk\Common\Input\AbstractCollectionInput;

/**
 * CollectionProductInput Class
 *
 * @package Misa\Accounting\Application\Input\Provider
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 *
 * @method String[] getCollection()
 */
class CollectionProductInput extends AbstractCollectionInput
{
    protected function validate($items)
    {
        foreach ($items as $item) {
            if ($this->isScalar($item, 'Producto Id')) {
                $this->items[] = $item;
            }
        }
    }
}
