<?php

namespace Misa\Accounting\Infrastructure\Ui\AccountingBundle\Controller;

use Misa\Accounting\Application\Services\Payment;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use MisaSdk\Common\Controller\Controller;

/**
 * PaymentController Class
 *
 * @package Misa\Accounting\Infrastructure\Ui\AccountingBundle\Controller
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2018, Getmin
 * @Route("/payment")
 */
class PaymentController extends Controller
{

    /** @var Payment\MngService */
    private $paymentMngService;

    public function __construct(Payment\MngService $paymentMngService)
    {
        $this->paymentMngService = $paymentMngService;
    }


    /**
     * @Route("", name="accounting_payment_create")
     * @Method({"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function createPaymentAction(Request $request)
    {

        $id = $this->paymentMngService->create(new Payment\Input\InputPayment(
            $request->get('product_id'),
            $request->get('paid_at'),
            $request->get('document_type_id'),
            $request->get('document_number'),
            $request->get('document_status'),
            $request->get('type_id'),
            $request->get('amount'),
            $request->get('amount_type')
        ));

        return new JsonResponse(['id' => $id]);
    }
}
