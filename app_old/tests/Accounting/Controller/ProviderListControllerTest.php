<?php

namespace MisaTests\Accounting\Controller;

use MisaSdk\Common\Entity\MisaUuid;
use MisaSdk\Common\Test\MisaIntegrationTest;
use Ramsey\Uuid\Uuid;

/**
 * ProviderListControllerTest Class
 *
 * @package MisaTests\Accounting\Controller
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class ProviderListControllerTest extends MisaIntegrationTest
{

    protected function getStaticUrl()
    {
        return 'accounting/providers';
    }

    public function testCargarDataformulario()
    {
        $dataResponse = $this->request('GET', $this->getUrl('loadform'));

        $this->assertEquals(200,$dataResponse->statusCode());

        $data = $dataResponse->body();
    }

    public function testCargarDataCache()
    {
        $dataResponse = $this->request('GET', $this->getUrl('loadform'));

        $this->assertEquals(200,$dataResponse->statusCode());
    }


    public function testGetById()
    {
        //http://localhost:8085/v1/accounting/providers/54958337-e3f9-49dd-8285-a3fba5e7c2ea
        $dataResponse = $this->request('GET', $this->getUrl('54958337-e3f9-49dd-8285-a3fba5e7c2ea'));
        $this->assertEquals(200,$dataResponse->statusCode());
        $provider = $dataResponse->body();

        $this->assertCount(7,$provider);

        $this->assertEquals('54958337-e3f9-49dd-8285-a3fba5e7c2ea',$provider['id']);
        $this->assertEquals('jose Guillermo Completo',$provider['contac_name']);

        $this->assertCount(9,$provider['company']);
        $this->assertEquals('20552196578',$provider['company']['document_number']);

        $this->assertCount(5,$provider['phones']);
        foreach ($provider['phones'] as $phone){
            $this->assertEquals(2,$phone['type']);
            $this->assertEquals('Celular',$phone['type_label']);
            $this->assertTrue(Uuid::isValid($phone['id']));
            $this->assertRegExp("/^\(05[1-5]\)741852963$/",$phone['number']);
        }

        $this->assertCount(5,$provider['emails']);
        foreach ($provider['emails'] as $email){
            $this->assertRegExp("/^abc[1-5]@xyz.com$/",$email['email']);
        }

        $this->assertCount(5,$provider['products']);
        foreach ($provider['products'] as $product){
            $this->assertEquals(0,$product['level']);
            $this->assertTrue(Uuid::isValid($product['product_id']));
            $this->assertTrue(Uuid::isValid($product['item_id']));
            $this->assertTrue(Uuid::isValid($product['id']));
            $this->assertTrue(isset($product['product_name']));
            $this->assertTrue(isset($product['item_code']));
            $this->assertTrue(isset($product['item_description']));
        }

        $this->assertCount(5,$provider['bankAccounts']);
        foreach ($provider['bankAccounts'] as $bankAccount){
            $this->assertTrue(Uuid::isValid($bankAccount['id']));

            $this->assertEquals(1, $bankAccount['type']);
            $this->assertEquals('Cuenta Corriente', $bankAccount['type_label']);

            $this->assertEquals(2, $bankAccount['money']);
            $this->assertEquals('Soles', $bankAccount['money_label']);

            $this->assertRegExp("/^888777999\-[1-5]$/",$bankAccount['number']);
            $this->assertRegExp("/^0365\-888777999\-[1-5]$/",$bankAccount['number_interbank']);

            $this->assertTrue(Uuid::isValid($bankAccount['bank_id']));
            $this->assertTrue(isset($bankAccount['bank_name']));
            $this->assertTrue(isset($bankAccount['holder_name']));
        }

    }
}