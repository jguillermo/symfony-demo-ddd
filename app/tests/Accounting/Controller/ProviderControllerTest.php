<?php

namespace MisaTests\Accounting\Controller;

use MisaSdk\Common\Test\MisaIntegrationTest;

/**
 * ProviderControllerTest Class
 *
 * @package MisaTests\Accounting\Controller
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class ProviderControllerTest extends MisaIntegrationTest
{

    protected function getStaticUrl()
    {
        return 'accounting/accountings';
    }

    public function testCreateProvider()
    {
        $dataResponse = $this->request('POST', $this->getUrl(), [
            'source_data_document_type'=>1,
            'source_data_document_number'=>123456789,
            'source_name'=>'a',
            'source_trade_name'=>'b',
            'source_address'=>'c',
            'source_ubigeo'=>'130',
            'source_data_entity_id'=>64,
            'source_data_entity_name'=>'company',
            'provider_contac_name' => 'jose'
        ]);

        $this->assertEquals(200,$dataResponse->statusCode());
    }
}