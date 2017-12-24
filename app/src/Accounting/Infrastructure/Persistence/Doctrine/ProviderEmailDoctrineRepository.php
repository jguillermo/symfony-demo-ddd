<?php

namespace Misa\Accounting\Infrastructure\Persistence\Doctrine;

use Misa\Accounting\Domain\Provider\Information\Email;
use Misa\Accounting\Domain\Provider\Information\EmailRepository;
use MisaSdk\Common\Adapter\Persistence\Doctrine\DoctrineRepository;

/**
 * ProviderEmailDoctrineRepository Class
 *
 * @package Misa\Accounting\Infrastructure\Persistence\Doctrine
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class ProviderEmailDoctrineRepository extends DoctrineRepository implements EmailRepository
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
    public function persist(Email $email)
    {
        $this->em->persist($email);
        $this->em->flush();
        return true;
    }

    /**
     * @inheritdoc
     */
    public function delete(Email $email)
    {
        $this->em->remove($email);
        $this->em->flush();
        return true;
    }
}
