<?php

namespace Misa\Accounting\Infrastructure\Persistence\Doctrine;

use Misa\Accounting\Domain\Provider\BankDetail\BankAccount;
use Misa\Accounting\Domain\Provider\BankDetail\BankAccountRepository;
use MisaSdk\Common\Adapter\Persistence\Doctrine\DoctrineRepository;

/**
 * ProviderEmailDoctrineRepository Class
 *
 * @package Misa\Accounting\Infrastructure\Persistence\Doctrine
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class ProviderBankAccountDoctrineRepository extends DoctrineRepository implements BankAccountRepository
{

    /**
     * @inheritdoc
     */
    public function findById($emailId)
    {
        return $this->repository->find($emailId);
    }

    /**
     * @inheritdoc
     */
    public function persist(BankAccount $email)
    {
        $this->em->persist($email);
        $this->em->flush();
        return true;
    }

    /**
     * @inheritdoc
     */
    public function delete(BankAccount $email)
    {
        $this->em->remove($email);
        $this->em->flush();
        return true;
    }
}
