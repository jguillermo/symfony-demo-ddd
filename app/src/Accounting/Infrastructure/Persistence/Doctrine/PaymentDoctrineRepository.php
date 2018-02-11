<?php

namespace Misa\Accounting\Infrastructure\Persistence\Doctrine;

use Misa\Accounting\Domain\Payment\Payment;
use Misa\Accounting\Domain\Payment\PaymentRepository;
use MisaSdk\Common\Adapter\Persistence\Doctrine\DoctrineRepository;

/**
 * PaymentDoctrineRepository Class
 *
 * @package Misa\Accounting\Infrastructure\Persistence\Doctrine
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2018, Getmin
 */
class PaymentDoctrineRepository extends DoctrineRepository implements PaymentRepository
{

    /**
     * @inheritdoc
     */
    public function persist(Payment $payment)
    {
        $this->em->persist($payment);
        $this->em->flush();
        return true;
    }
}
