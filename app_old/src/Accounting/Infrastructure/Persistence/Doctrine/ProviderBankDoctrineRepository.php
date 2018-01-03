<?php

namespace Misa\Accounting\Infrastructure\Persistence\Doctrine;

use Misa\Accounting\Domain\Provider\BankDetail\Bank;
use Misa\Accounting\Domain\Provider\BankDetail\BankRepository;
use MisaSdk\Common\Adapter\Persistence\Doctrine\DoctrineRepository;

/**
 * ProviderBankDoctrineRepository Class
 *
 * @package Misa\Accounting\Infrastructure\Persistence\Doctrine
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class ProviderBankDoctrineRepository extends DoctrineRepository implements BankRepository
{
    /**
     * @inheritdoc
     */
    public function findById($bankId)
    {
        return $this->repository->find($bankId);
    }

    /**
     * @inheritdoc
     */
    public function findAll()
    {
        return $this->repository->findAll();
    }
}
