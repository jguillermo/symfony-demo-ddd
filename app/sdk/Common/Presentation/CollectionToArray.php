<?php

namespace MisaSdk\Common\Presentation;

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
     * @param array $items
     * @return array
     * @throws PresentationExeption
     */
    public function toArray(array $items)
    {
        $data = [];
        /** @var MisaToArray $item */
        foreach ($items as $item) {
            if (! $item instanceof MisaToArray) {
                throw new PresentationExeption("error al convertir la data");
            }
            $data[] = $item->toArray();
        }

        return $data;
    }
}
