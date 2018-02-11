<?php

namespace MisaSdk\Common\Adapter\Persistence\Doctrine;

use Doctrine\ORM\EntityManagerInterface;
use Misa\Accounting\Application\Helper\PaymentHelperRepository;
use Misa\Accounting\Domain\Payment\DocumentType;
use Misa\Accounting\Domain\Payment\Type;
use MisaSdk\Common\Exception\BadRequest;
use MisaSdk\Common\Exception\Repository\NotFoundException;

/**
 * Class DoctrineRepository
 *
 * @package MisaSdk\Common\Adapter\Persistence\Doctrine
 * @author jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2016
 * @method DocumentType findDocumentType($entity, $id)
 * @method Type findType($entity, $id)
 */
class MisaDoctrineRepository
{
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    protected function misaFind(string $entity, string $id)
    {
        return $this->em->find($entity, $id);
    }

    protected function misaFindBy(string $entity, array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {

        return $this->em->getRepository($entity)->findBy($criteria, $orderBy, $limit, $offset);
    }

    protected function misaFindOneBy(string $entity, array $criteria)
    {
        return $this->em->getRepository($entity)->findOneBy($criteria);
    }

    public function __call($method, array $args = [])
    {
        if (0 === \strpos($method, 'find')) {
            if (empty($args[0]) || empty($args[1])) {
                throw new BadRequest('Ingresar el nombre de entidad y el id a buscar');
            }
            return $this->misaFind($args[0], $args[1]);
        }

        throw new BadRequest('No entity #' . $method . ' exists.');
    }
}
