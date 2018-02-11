<?php

namespace MisaTests\Accounting\Controller\Payment;

use MisaSdk\Common\Test\MisaIntegrationTest;

/**
 * PaymentListTest Class
 *
 * @package MisaTests\Accounting\Controller\Payment
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2018, Getmin
 */
class PaymentListTest extends MisaIntegrationTest
{

    protected function getStaticUrl()
    {
        return 'accounting/payment/report';
    }

    public function testCrearOk()
    {
        $dataResponse = $this->request('GET', $this->getUrl('987654'));
        $this->assertEquals(200,$dataResponse->statusCode());
        $data = $dataResponse->body();

        $this->assertCount(3,$data);

        $this->assertEquals('Producto 1',$data[0]['producto']);
        $this->assertEquals('150.00',$data[0]['monto']);
        $this->assertEquals('S/',$data[0]['simbolo']);

    }
}