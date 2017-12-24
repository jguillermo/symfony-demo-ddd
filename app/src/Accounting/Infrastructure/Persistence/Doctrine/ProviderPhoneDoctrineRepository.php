<?php

namespace Misa\Accounting\Infrastructure\Persistence\Doctrine;

use Misa\Accounting\Domain\Provider\Information\Phone;
use Misa\Accounting\Domain\Provider\Information\PhoneRepository;
use MisaSdk\Common\Adapter\Persistence\Doctrine\DoctrineRepository;

/**
 * ProviderPhoneDoctrineRepository Class
 *
 * @package Misa\Accounting\Infrastructure\Persistence\Doctrine
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class ProviderPhoneDoctrineRepository extends DoctrineRepository implements PhoneRepository
{

    /**
     * @inheritdoc
     */
    public function findById($phoneId)
    {
        return $this->repository->find($phoneId);
    }

    /**
     * @inheritdoc
     */
    public function persist(Phone $phone)
    {
        $this->em->persist($phone);
        $this->em->flush();
        return true;
    }

    /**
     * @inheritdoc
     */
    public function delete(Phone $phone)
    {
        $this->em->remove($phone);
        $this->em->flush();
        return true;
    }
}
