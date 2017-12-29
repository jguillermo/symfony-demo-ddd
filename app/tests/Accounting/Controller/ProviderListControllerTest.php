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




    }
}