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
     * @param $BankId
     * @return Bank
     */
    public function findById($BankId)
    {
        // TODO: Implement findById() method.
    }
}
