<?php

namespace MisaTests\Accounting\Controller;

use MisaSdk\Common\Test\MisaIntegrationTest;

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
        return 'accounting/providers/loadform';
    }

    public function testCargarDataformulario()
    {
        $dataResponse = $this->request('GET', $this->getUrl());

        $this->assertEquals(200,$dataResponse->statusCode());

        $data = $dataResponse->body();
    }

    public function testCargarDataCache()
    {
        $dataResponse = $this->request('GET', $this->getUrl());

        $this->assertEquals(200,$dataResponse->statusCode());
    }

}