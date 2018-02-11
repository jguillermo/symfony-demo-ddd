<?php

namespace Misa\Accounting\Application\Services\Payment;

use Misa\Accounting\Domain\Payment\PaymentRepository;
use Misa\Accounting\Presentation\Payment\ListPresentation as PaymentListPresentation;

/**
 * ListService Class
 *
 * @package Misa\Accounting\Application\Services\Payment
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2018, Getmin
 */
class ListService
{
    /** @var PaymentRepository */
    private $paymentRepository;

    /** @var PaymentListPresentation */
    private $paymentListPresentation;

    public function __construct(PaymentRepository $paymentRepository, PaymentListPresentation $paymentListPresentation)
    {
        $this->paymentRepository = $paymentRepository;
        $this->paymentListPresentation = $paymentListPresentation;
    }


    public function findByUserId($userId)
    {

        $payments = $this->paymentRepository->findByUserId($userId);
        return $this->paymentListPresentation->collectionSerializer($payments);
    }
}
