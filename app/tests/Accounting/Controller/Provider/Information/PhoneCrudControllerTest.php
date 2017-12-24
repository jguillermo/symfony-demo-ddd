<?php

namespace MisaTests\Accounting\Controller\Provider\Information;

use Misa\Accounting\Domain\Provider\Information\Phone;
use Misa\Accounting\Infrastructure\Ui\AccountingBundle\DataFixtures\ORM\LoadCompanyData;
use Misa\Accounting\Infrastructure\Ui\AccountingBundle\DataFixtures\ORM\LoadProviderData;
use MisaSdk\Common\Test\CodeHttpException;
use MisaSdk\Common\Test\MisaIntegrationTest;

/**
 * PhoneCrudControllerTest Class
 *
 * @package MisaTests\Accounting\Controller\Provider\Information
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class PhoneCrudControllerTest extends MisaIntegrationTest
{
    protected function getStaticUrl()
    {
        return 'accounting/providers/'.LoadProviderData::PROVIDER_INFORMATION_ID.'/phone';
    }


    public function testAddErrorData()
    {
        $this->expectException(CodeHttpException::class);
        $this->expectExceptionCode(500);
        $dataResponse = $this->request('POST', $this->getUrl(), []);

    }

    public function testAddData()
    {
        $dataResponse = $this->request('POST', $this->getUrl(), [
                'number'=>'654321987',
                'type'=>2
        ]);

        $this->assertEquals(200,$dataResponse->statusCode());
        $id = $dataResponse->body('id');

        /** @var Phone $phone */
        $phone = $this->em->find(Phone::class,$id);
        $this->assertEquals('654321987', $phone->number());
        $this->assertEquals(2, $phone->type());

        return $id;
    }

    /**
     * @depends testAddData
     */
    public function testEditPhoneNumber($phoneId)
    {
        $dataResponse = $this->request('PUT', $this->getUrl($phoneId), [
            'number'=>'999999999',
        ]);

        $this->assertEquals(200,$dataResponse->statusCode());

        /** @var Phone $phone */
        $phone = $this->em->find(Phone::class,$phoneId);
        $this->assertEquals('999999999', $phone->number());
        $this->assertEquals(2, $phone->type());

        return $phoneId;
    }

    /**
     * @depends testEditPhoneNumber
     */
    public function testEditPhoneType($phoneId)
    {
        $dataResponse = $this->request('PUT', $this->getUrl($phoneId), [
            'type'=>3
        ]);

        $this->assertEquals(200,$dataResponse->statusCode());

        /** @var Phone $phone */
        $phone = $this->em->find(Phone::class,$phoneId);
        $this->assertEquals(3, $phone->type());
        $this->assertEquals('999999999', $phone->number());

        return $phoneId;
    }

    /**
     * @depends testEditPhoneType
     * @param $phoneId
     */
    public function testDeletePhone($phoneId)
    {
        $dataResponse = $this->request('DELETE', $this->getUrl($phoneId));
        $this->assertEquals(200,$dataResponse->statusCode());

        /** @var Phone $phone */
        $phone = $this->em->find(Phone::class,$phoneId);
        $this->assertEquals(null, $phone);
    }
}