<?php

namespace Misa\Accounting\Domain\Payment;

/**
 * PaymentRepository Interface
 *
 * @package Misa\Accounting\Domain\Payment
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2018, Getmin
 */
interface PaymentRepository
{
    /**
     * @param Payment $payment
     * @return bool
     */
    public function persist(Payment $payment);

    /**
     * @param $userId
     * @return Payment[]
     */
    public function findByUserId($userId);
}
