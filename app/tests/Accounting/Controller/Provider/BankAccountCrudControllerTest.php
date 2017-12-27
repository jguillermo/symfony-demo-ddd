<?php

namespace MisaTests\Accounting\Controller\Provider;

use Misa\Accounting\Domain\Provider\BankDetail\AccountMoney;
use Misa\Accounting\Domain\Provider\BankDetail\AccountType;
use Misa\Accounting\Domain\Provider\BankDetail\BankAccount;
use Misa\Accounting\Domain\Provider\Information\Phone;
use Misa\Accounting\Infrastructure\Ui\AccountingBundle\DataFixtures\ORM\LoadProviderBankData;
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
class BankAccountCrudControllerTest extends MisaIntegrationTest
{
    protected function getStaticUrl()
    {
        return 'accounting/providers/'.LoadProviderData::PROVIDER_INFORMATION_ID.'/bank-account';
    }


    public function testAddErrorData()
    {
        $this->expectException(CodeHttpException::class);
        $this->expectExceptionCode(400);
        $dataResponse = $this->request('POST', $this->getUrl(), []);

    }

    public function testAddData()
    {
        $dataResponse = $this->request('POST', $this->getUrl(), [
            'type'=>AccountType::CURRENT,
            'money'=>AccountMoney::SOLES,
            'holder_name'=>'hola',
            'bank_id'=>LoadProviderBankData::BANK_1_ID,
            'number'=>35165684,
            'number_interbank'=>3213654684
        ]);

        $this->assertEquals(200,$dataResponse->statusCode());
        $id = $dataResponse->body('id');

        /** @var BankAccount $bankAccount */
        $bankAccount = $this->em->find(BankAccount::class,$id);
        $this->assertEquals('35165684', $bankAccount->number()->number());
        $this->assertEquals('3213654684', $bankAccount->number()->interbank());
        $this->assertEquals(AccountType::CURRENT, $bankAccount->type());
        $this->assertEquals(AccountMoney::SOLES, $bankAccount->money());
        $this->assertEquals('hola', $bankAccount->holderName());
        $this->assertEquals(LoadProviderBankData::BANK_1_ID, $bankAccount->bank()->id());

        return $id;
    }

    /**
     * @depends testAddData
     */
    public function testEditTypeAccount($bankAccountId)
    {
        $dataResponse = $this->request('PUT', $this->getUrl($bankAccountId), [
            'type'=>AccountType::SAVING,
        ]);

        $this->assertEquals(200,$dataResponse->statusCode());

        /** @var BankAccount $bankAccount */
        $bankAccount = $this->em->find(BankAccount::class,$bankAccountId);
        $this->assertEquals('35165684', $bankAccount->number()->number());
        $this->assertEquals('3213654684', $bankAccount->number()->interbank());
        $this->assertEquals(AccountType::SAVING, $bankAccount->type());
        $this->assertEquals(AccountMoney::SOLES, $bankAccount->money());
        $this->assertEquals('hola', $bankAccount->holderName());
        $this->assertEquals(LoadProviderBankData::BANK_1_ID, $bankAccount->bank()->id());

        return $bankAccountId;
    }

    /**
     * @depends testEditTypeAccount
     */
    public function testEditBankAccount($bankAccountId)
    {
        $dataResponse = $this->request('PUT', $this->getUrl($bankAccountId), [
            'bank_id'=>LoadProviderBankData::BANK_2_ID,
        ]);

        $this->assertEquals(200,$dataResponse->statusCode());

        /** @var BankAccount $bankAccount */
        $bankAccount = $this->em->find(BankAccount::class,$bankAccountId);
        $this->assertEquals('35165684', $bankAccount->number()->number());
        $this->assertEquals('3213654684', $bankAccount->number()->interbank());
        $this->assertEquals(AccountType::SAVING, $bankAccount->type());
        $this->assertEquals(AccountMoney::SOLES, $bankAccount->money());
        $this->assertEquals('hola', $bankAccount->holderName());
        $this->assertEquals(LoadProviderBankData::BANK_2_ID, $bankAccount->bank()->id());

        return $bankAccountId;
    }

    /**
     * @depends testEditBankAccount
     */
    public function testEditNumberAccount($bankAccountId)
    {
        $dataResponse = $this->request('PUT', $this->getUrl($bankAccountId), [
            'number'=>351656845
        ]);

        $this->assertEquals(200,$dataResponse->statusCode());

        /** @var BankAccount $bankAccount */
        $bankAccount = $this->em->find(BankAccount::class,$bankAccountId);
        $this->assertEquals('351656845', $bankAccount->number()->number());
        $this->assertEquals('3213654684', $bankAccount->number()->interbank());
        $this->assertEquals(AccountType::SAVING, $bankAccount->type());
        $this->assertEquals(AccountMoney::SOLES, $bankAccount->money());
        $this->assertEquals('hola', $bankAccount->holderName());
        $this->assertEquals(LoadProviderBankData::BANK_2_ID, $bankAccount->bank()->id());

        return $bankAccountId;
    }

    /**
     * @depends testEditNumberAccount
     * @param $bankAccountId
     */
    public function testDeletePhone($bankAccountId)
    {
        $dataResponse = $this->request('DELETE', $this->getUrl($bankAccountId));
        $this->assertEquals(200,$dataResponse->statusCode());

        /** @var BankAccount $bankAccount */
        $bankAccount = $this->em->find(BankAccount::class,$bankAccountId);
        $this->assertEquals(null, $bankAccount);
    }
}