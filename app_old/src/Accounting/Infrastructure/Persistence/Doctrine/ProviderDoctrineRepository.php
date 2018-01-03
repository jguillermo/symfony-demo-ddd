<?php

namespace Misa\Accounting\Infrastructure\Persistence\Doctrine;

use Misa\Accounting\Domain\Provider\Provider;
use Misa\Accounting\Domain\Provider\ProviderRepository;
use MisaSdk\Common\Adapter\Persistence\Doctrine\DoctrineRepository;

/**
 * ProviderDoctrineRepository Class
 *
 * @package Misa\Accounting\Infrastructure\Persistence\Doctrine
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class ProviderDoctrineRepository extends DoctrineRepository implements ProviderRepository
{
    /**
     * @inheritdoc
     */
    public function findById($providerId)
    {
        return $this->repository->find($providerId);
    }

    /**
     * @inheritdoc
     */
    public function persist(Provider $provider)
    {
        $this->em->persist($provider);
        $this->em->flush();
        return true;
    }
}
