<?php

namespace MisaTests\Accounting\Controller\Provider\Information;

use Misa\Accounting\Domain\Provider\Information\Email;
use Misa\Accounting\Infrastructure\Ui\AccountingBundle\DataFixtures\ORM\LoadCompanyData;
use Misa\Accounting\Infrastructure\Ui\AccountingBundle\DataFixtures\ORM\LoadProviderData;
use MisaSdk\Common\Test\CodeHttpException;
use MisaSdk\Common\Test\MisaIntegrationTest;

/**
 * EmailCrudControllerTest Class
 *
 * @package MisaTests\Accounting\Controller\Provider\Information
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class EmailCrudControllerTest extends MisaIntegrationTest
{
    protected function getStaticUrl()
    {
        return 'accounting/providers/'.LoadProviderData::PROVIDER_INFORMATION_ID.'/email';
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
                'email'=>'abc@efg.com'
        ]);

        $this->assertEquals(200,$dataResponse->statusCode());
        $id = $dataResponse->body('id');

        /** @var Email $email */
        $email = $this->em->find(Email::class,$id);
        $this->assertEquals('abc@efg.com', $email->email());

        return $id;
    }

    /**
     * @depends testAddData
     */
    public function testEditEmail($emailId)
    {
        $dataResponse = $this->request('PUT', $this->getUrl($emailId), [
            'email'=>'jose@efg.com'
        ]);

        $this->assertEquals(200,$dataResponse->statusCode());

        /** @var Email $email */
        $email = $this->em->find(Email::class,$emailId);
        $this->assertEquals('jose@efg.com', $email->email());

        return $emailId;
    }

    /**
     * @depends testEditEmail
     * @param $emailId
     */
    public function testDeleteEmail($emailId)
    {
        $dataResponse = $this->request('DELETE', $this->getUrl($emailId));
        $this->assertEquals(200,$dataResponse->statusCode());

        /** @var Email $email */
        $email = $this->em->find(Email::class,$emailId);
        $this->assertEquals(null, $email);
    }
}