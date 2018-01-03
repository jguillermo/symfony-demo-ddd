<?php

namespace Misa\Accounting\Infrastructure\Persistence\Doctrine;

use Misa\Accounting\Domain\Product\Item;
use Misa\Accounting\Domain\Product\ItemRepository;
use MisaSdk\Common\Adapter\Persistence\Doctrine\DoctrineRepository;

/**
 * ProductItemRepository Class
 *
 * @package Misa\Accounting\Infrastructure\Persistence\Doctrine
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class ProductItemRepository extends DoctrineRepository implements ItemRepository
{
    /**
     * @inheritdoc
     */
    public function getById($itemId)
    {
        return $this->repository->find($itemId);
    }

    /**
     * @inheritdoc
     */
    public function findAll()
    {
        return $this->repository->findAll();
    }

    /**
     * @inheritdoc
     */
    public function persist(Item $item)
    {
        $this->em->persist($item);
        $this->em->flush();
        return true;
    }

    /**
     * @inheritdoc
     */
    public function remove(Item $item)
    {
        $this->em->remove($item);
        $this->em->flush();
        return true;
    }
}
