<?php

namespace MisaSdk\Common\Entity;

use MisaSdk\Common\Exception\AppException;
use MisaSdk\Common\Exception\PresentationExeption;

/**
 * CollectionToArray Trait
 *
 * @package MisaSdk\Common\Presentation
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
trait CollectionToArray
{
    /**
     * @param $items
     * @return array
     * @throws AppException
     */
    protected function collectionToArray($items)
    {
        $data = [];
        /** @var MisaToArray $item */
        foreach ($items as $item) {
            if (! $item instanceof MisaToArray) {
                throw new AppException("error al convertir la data");
            }
            $data[] = $item->toArray();
        }

        return $data;
    }
}
