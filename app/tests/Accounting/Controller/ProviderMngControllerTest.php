<?php

namespace MisaTests\Accounting\Controller;

use Misa\Accounting\Domain\Provider\BankDetail\AccountMoney;
use Misa\Accounting\Domain\Provider\BankDetail\AccountType;
use Misa\Accounting\Infrastructure\Ui\AccountingBundle\DataFixtures\ORM\LoadProductData;
use Misa\Accounting\Infrastructure\Ui\AccountingBundle\DataFixtures\ORM\LoadProviderBankData;
use MisaSdk\Common\Enum\Information\Phone\PhoneType;
use MisaSdk\Common\Test\MisaIntegrationTest;

/**
 * ProviderControllerTest Class
 *
 * @package MisaTests\Accounting\Controller
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class ProviderMngControllerTest extends MisaIntegrationTest
{

    protected function getStaticUrl()
    {
        return 'accounting/providers';
    }

    public function testCrearUnaSoloConDatosDeEmpresa()
    {
        $dataResponse = $this->request('POST', $this->getUrl(), [
            'source_data_document_type'=>1,
            'source_data_document_number'=>123456789,
            'source_name'=>'Empresa 1',
            'source_trade_name'=>'Empresa UNO',
            'source_address'=>'Jr 123',
            'source_ubigeo'=>'011526',
            'source_data_entity_id'=>64,
            'source_data_entity_name'=>'company',
            'provider_contac_name' => 'Jose Guillermo1'
        ]);

        $this->assertEquals(200,$dataResponse->statusCode());

        $id = $dataResponse->body('id');
    }


    public function testCrearAgregantoTelefonos()
    {
        $dataResponse = $this->request('POST', $this->getUrl(), [
            'source_data_document_type'=>1,
            'source_data_document_number'=>123456789,
            'source_name'=>'Empresa 2',
            'source_trade_name'=>'Empresa DOS',
            'source_address'=>'Jr 123',
            'source_ubigeo'=>'011526',
            'source_data_entity_id'=>64,
            'source_data_entity_name'=>'company',
            'provider_contac_name' => 'Jose Guillermo2',
            'phones'=>[
                ['number'=>987654,'type'=>PhoneType::LANDLINE],
                ['number'=>932561258,'type'=>PhoneType::CELL_PHONE],
            ]
        ]);

        $this->assertEquals(200,$dataResponse->statusCode());

        $id = $dataResponse->body('id');
    }

    public function testCrearAgregantoEmails()
    {
        $dataResponse = $this->request('POST', $this->getUrl(), [
            'source_data_document_type'=>1,
            'source_data_document_number'=>123456789,
            'source_name'=>'Empresa 3',
            'source_trade_name'=>'Empresa TRES',
            'source_address'=>'Jr 123',
            'source_ubigeo'=>'011526',
            'source_data_entity_id'=>64,
            'source_data_entity_name'=>'company',
            'provider_contac_name' => 'Jose Guillermo3',
            'emails'=>[
                ['email'=>'abc@efg.com'],
                ['email'=>'sdf@dfsdf.com'],
            ]
        ]);

        $this->assertEquals(200,$dataResponse->statusCode());

        $id = $dataResponse->body('id');
    }

    public function testCrearAgregantoCuentaBancaria()
    {
        $dataResponse = $this->request('POST', $this->getUrl(), [
            'source_data_document_type'=>1,
            'source_data_document_number'=>123456789,
            'source_name'=>'Empresa 4',
            'source_trade_name'=>'Empresa CUATRO',
            'source_address'=>'Jr 123',
            'source_ubigeo'=>'011526',
            'source_data_entity_id'=>64,
            'source_data_entity_name'=>'company',
            'provider_contac_name' => 'Jose Guillermo4',
            'bank_accounts'=>[
                [
                    'type'=>AccountType::CURRENT,
                    'money'=>AccountMoney::SOLES,
                    'holder_name'=>'propietario 1',
                    'bank_id'=>LoadProviderBankData::BANK_1_ID,
                    'number'=>'32165498751321',
                    'number_interbank'=>'1132165498751321313513'
                ],
                [
                    'type'=>AccountType::CURRENT,
                    'money'=>AccountMoney::DOLLAR,
                    'holder_name'=>'propietario 2',
                    'bank_id'=>LoadProviderBankData::BANK_2_ID,
                    'number'=>'5498431843546845',
                    'number_interbank'=>'1154984318435468455165'
                ]
            ]
            ]);

        $this->assertEquals(200,$dataResponse->statusCode());

        $id = $dataResponse->body('id');
    }


    public function testCrearAgregandoProductos()
    {
        $dataResponse = $this->request('POST', $this->getUrl(), [
            'source_data_document_type'=>1,
            'source_data_document_number'=>123456789,
            'source_name'=>'Empresa 5',
            'source_trade_name'=>'Empresa CINCO',
            'source_address'=>'Jr 123',
            'source_ubigeo'=>'011526',
            'source_data_entity_id'=>64,
            'source_data_entity_name'=>'company',
            'provider_contac_name' => 'Jose Guillermo5',
            'products_id'=>[
                LoadProductData::PRODUCT_1_ID,
                LoadProductData::PRODUCT_2_ID,
                LoadProductData::PRODUCT_3_ID,
                LoadProductData::PRODUCT_4_ID,
                ]
        ]);

        $this->assertEquals(200,$dataResponse->statusCode());

        $id = $dataResponse->body('id');
    }



}