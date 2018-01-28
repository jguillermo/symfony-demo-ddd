<?php

namespace Misa\Accounting\Application\Services\Payment;

use Misa\Accounting\Application\Helper\PaymentHelperRepository;
use Misa\Accounting\Application\Services\Payment\Input\InputPayment;
use Misa\Accounting\Domain\Payment\DocumentType;
use Misa\Accounting\Domain\Payment\Payment;
use Misa\Accounting\Domain\Payment\PaymentRepository;
use Misa\Accounting\Domain\Payment\Type;
use Misa\Accounting\Domain\Product\ProductRepository;
use MisaSdk\Common\Exception\BadRequest;

/**
 * MngService Class
 *
 * @package Misa\Accounting\Application\Services\Payment
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2018, Getmin
 */
class MngService
{
    /** @var PaymentRepository */
    private $paymentRepository;

    /** @var ProductRepository */
    private $productRepository;

    /** @var PaymentHelperRepository */
    private $paymentHelperRepository;

    public function __construct(
        PaymentRepository $paymentRepository,
        ProductRepository $productRepository,
        PaymentHelperRepository $paymentHelperRepository
    ) {
        $this->paymentRepository = $paymentRepository;
        $this->productRepository = $productRepository;
        $this->paymentHelperRepository = $paymentHelperRepository;
    }


    public function create(InputPayment $data)
    {

        $product = $this->productRepository->findById($data->productId());
        if (! $product) {
            throw new BadRequest("Error: El product no existe");
        }

        $documentType = $this->paymentHelperRepository->findDocumentType(DocumentType::class, $data->documentTypeId());
        if (! $documentType) {
            throw new BadRequest("Error: El tipo de documento no existe");
        }

        $paymentType = $this->paymentHelperRepository->findType(Type::class, $data->typeId());
        if (! $paymentType) {
            throw new BadRequest("Error: El tipo de Pago no existe");
        }

        $payment = Payment::create(
            $product,
            $data->paidAt(),
            $documentType,
            $data->documentNumber(),
            $paymentType,
            $data->amount(),
            $data->amountType()
        );
        $this->paymentRepository->persist($payment);

        return $product->id();
    }
}
