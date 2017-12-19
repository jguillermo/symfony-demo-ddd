<?php

namespace MisaSdk\Common\Entity;

/**
 * AbstractCollectionEntity Class
 *
 * @package MisaSdk\Common\Entity
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class CollectionEntity
{
    protected $collection;

    public static function create(array $collection)
    {
        $collectionEntity = new self();
        $collectionEntity->collection = $collection;
        return $collectionEntity;
    }
}
