<?php

namespace Misa\Accounting\Infrastructure\Persistence\Doctrine;

use Misa\Accounting\Domain\Provider\Source\Source;
use Misa\Accounting\Domain\Provider\Source\SourceRepository;
use MisaSdk\Common\Adapter\Persistence\Doctrine\DoctrineRepository;

/**
 * SourceDoctrineRepository Class
 *
 * @package Misa\Accounting\Infrastructure\Persistence\Doctrine
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class SourceDoctrineRepository extends DoctrineRepository implements SourceRepository
{

    /**
     * @inheritdoc
     */
    public function create(Source $source)
    {
        return $this->persist($source);
    }

    /**
     * @inheritdoc
     */
    public function findById($sourceId)
    {
        return $this->repository->find($sourceId);
    }

    /**
     * @inheritdoc
     */
    public function update(Source $source)
    {
        return $this->persist($source);
    }

    private function persist(Source $source)
    {
        $this->em->persist($source);
        $this->em->flush();
        return true;
    }
}
