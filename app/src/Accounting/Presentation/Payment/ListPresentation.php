<?php

namespace Misa\Accounting\Presentation\Payment;

use Misa\Accounting\Domain\Payment\AmountType;
use Misa\Accounting\Domain\Payment\Payment;

/**
 * ListPresentation Class
 *
 * @package Misa\Accounting\Presentation\Payment
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2018, Getmin
 */
class ListPresentation
{
    public function serializerEncode(Payment $payment)
    {
        return [
            'id' => $payment->id(),
            'producto' => $payment->product()->name(),
            'monto' => number_format($payment->amount(), 2),
            'simbolo' => AmountType::getSymbol($payment->amountType())
        ];
    }

    /**
     * @param Payment[] $payments
     * @return array
     */
    public function collectionSerializer(array $payments)
    {
        $data = [];
        foreach ($payments as $payment) {
            $data[] = $this->serializerEncode($payment);
        }
        return $data;
    }
}
