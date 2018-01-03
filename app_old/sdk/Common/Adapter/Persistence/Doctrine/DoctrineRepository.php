<?php

namespace MisaSdk\Common\Adapter\Persistence\Doctrine;

use Doctrine\ORM\EntityManagerInterface;
use MisaSdk\Common\Exception\Repository\NotFoundException;

/**
 * Class DoctrineRepository
 *
 * @package MisaSdk\Common\Adapter\Persistence\Doctrine
 * @author jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2016
 */
class DoctrineRepository
{
    protected $em;
    protected $entityName;
    protected $repository;

    public function __construct(EntityManagerInterface $em, $entityName)
    {
        $this->em = $em;
        $this->entityName = $entityName;
        $this->repository = $this->em->getRepository($entityName);
    }

    public function getEntityManager()
    {
        return $this->em;
    }

    public function getTableName()
    {
        return $this->em->getClassMetadata($this->entityName)->getTableName();
    }

    public function getClassName()
    {
        return $this->entityName;
    }
}
