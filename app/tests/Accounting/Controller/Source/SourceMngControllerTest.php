<?php

namespace MisaTests\Accounting\Controller\Source;

use Misa\Accounting\Domain\Provider\Source\Source;
use MisaSdk\Common\Test\MisaIntegrationTest;

/**
 * ProviderListControllerTest Class
 *
 * @package MisaTests\Accounting\Controller
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class SourceMngControllerTest extends MisaIntegrationTest
{

    protected function getStaticUrl()
    {
        return 'accounting/companies';
    }

    private function getDataCompany()
    {
        return [
            'data_document_type'=>1,
            'data_document_number'=>654321498354,
            'name'=>'Empresa 3',
            'trade_name'=>'Empresa creado',
            'address'=>'Jr 1234',
            'ubigeo'=>'011526',
            'data_entity_id'=>64,
            'data_entity_name'=>'company',
        ];
    }

    public function testCargarDataformulario()
    {
        $dataCompany = $this->getDataCompany();
        $dataResponse = $this->request('POST', $this->getUrl(),$dataCompany);
        $this->assertEquals(200,$dataResponse->statusCode());
        $id = $dataResponse->body('id');

        /** @var Source $source */
        $source = $this->em->find(Source::class,$id);

        $this->assertEquals($dataCompany['name'], $source->name());
        $this->assertEquals($dataCompany['data_document_number'], $source->dataDocument()->number());

        return $id;
    }

    /**
     * @depends testCargarDataformulario
     */
    public function testActualizarEmpresa($companyId)
    {
        $dataCompany = $this->getDataCompany();

        $dataUpdate = [
            'data_document_number'=>783343498524,
            'trade_name'=>'Empresa creado 33'
        ];

        $dataResponse = $this->request('PUT', $this->getUrl($companyId),$dataUpdate);
        $this->assertEquals(200,$dataResponse->statusCode());


        /** @var Source $source */
        $source = $this->em->find(Source::class, $companyId);


        $this->assertEquals($dataUpdate['data_document_number'], $source->dataDocument()->number());
        $this->assertEquals($dataUpdate['trade_name'], $source->tradeName());

        $this->assertEquals($dataCompany['name'], $source->name());




    }



}