<?php

namespace MisaTests\Accounting\Controller\Payment;

use Misa\Accounting\Infrastructure\Ui\AccountingBundle\DataFixtures\ORM\LoadPaymentDocumentType;
use Misa\Accounting\Infrastructure\Ui\AccountingBundle\DataFixtures\ORM\LoadPaymentType;
use Misa\Accounting\Infrastructure\Ui\AccountingBundle\DataFixtures\ORM\LoadProductData;
use MisaSdk\Common\Test\CodeHttpException;
use MisaSdk\Common\Test\MisaIntegrationTest;
use Ramsey\Uuid\Uuid;

/**
 * PaymentMngTest Class
 *
 * @package MisaTests\Accounting\Controller\Payment
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2018, Getmin
 */
class PaymentMngTest extends MisaIntegrationTest
{

    protected function getStaticUrl()
    {
        return 'accounting/payment';
    }

    /**
     * @dataProvider additionProvider
     */
    public function testCrearError($paramName, $newErrorValue, $messagetxt, $errorCode)
    {
        if(is_null($paramName)){
            $data=[];
        }else{
            $data=$this->getDataOk();
            if(is_null($newErrorValue)){
                unset($data[$paramName]);
            }else{
                $data[$paramName]=$newErrorValue;
            }
        }


        $this->expectException(CodeHttpException::class);
        $this->expectExceptionCode($errorCode);
        if(!is_null($paramName)){
            $this->expectExceptionMessage($this->toUnicode($messagetxt));
        }
        $dataResponse = $this->request('POST', $this->getUrl(), $data);
        $this->assertEquals("Esto no va bien","nunca debio de entrar aqui");
    }

    public function additionProvider()
    {
        // paramName  newErrorValue messagetxt errorCode
        return [
            ['product_id', 'asd', 'Error Product Id : No es id válido',400],
            ['product_id', '', 'Error Product Id : No es id válido',400],
            ['product_id', null, 'Error Product Id : No es id válido',400],
            ['product_id', $this->getUuid(), 'Error: El product no existe',400],

            ['paid_at', 'sdfg', 'Error: la fecha de pago no es válida',400],
            ['paid_at', '', 'Error: la fecha de pago no es válida',400],
            ['paid_at', '2018-15-09', 'Error: la fecha de pago no es válida',400],
            ['paid_at', '2018-05-32', 'Error: la fecha de pago no es válida',400],
            ['paid_at', null, 'Ingresar la fecha de pago',400],

            ['document_type_id', 'dsrdg', 'Error Tipo de Documento Id : No es id válido',400],
            ['document_type_id', '', 'Error Tipo de Documento Id : No es id válido',400],
            ['document_type_id', null, 'Error Tipo de Documento Id : No es id válido',400],
            ['document_type_id', $this->getUuid(), 'Error: El tipo de documento no existe',400],

            ['document_number', '', 'Ingresar al menos 1 número de documento',400],
            ['document_number', null, 'Ingresar el número de documento',400],

            ['type_id', 'cdf', 'Error Tipo de Pago Id : No es id válido',400],
            ['type_id', '', 'Error Tipo de Pago Id : No es id válido',400],
            ['type_id', null, 'Error Tipo de Pago Id : No es id válido',400],
            ['type_id', $this->getUuid(), 'Error: El tipo de Pago no existe',400],

            ['amount', 'dfg', 'Error: ingresar un monto válido',400],
            ['amount', '-150', 'Error: ingresar un monto válido',400],
            ['amount', null, 'Ingresar el monto del pago',400],

            ['amount_type', 150, 'Error: ingresar un valor válido al tipo de monto',400],
            ['amount_type', 'sdf', 'Error: ingresar un valor válido al tipo de monto',400],
            ['amount_type', null, 'Ingrese el tipo de monto',400],

            [null, null, null,400],
        ];
    }

    public function getDataOk()
    {
        return [
            'product_id'=>LoadProductData::PRODUCT_1_ID,
            'paid_at'=>'2018-02-09',
            'document_type_id'=>LoadPaymentDocumentType::DOCUMENT_TYPE_1_ID,
            'document_number'=>1265,
            'document_status'=>1,
            'type_id'=>LoadPaymentType::TYPE_1_ID,
            'amount'=>150,
            'amount_type'=>2,
        ];
    }

    public function testCrearOk()
    {
        $dataOk = $this->getDataOk();
        for($i=0;$i<3;$i++){
            $dataResponse = $this->request('POST', $this->getUrl(), $dataOk);
            $this->assertEquals(200,$dataResponse->statusCode());
//            $id = $dataResponse->body('id');
        }

    }

}