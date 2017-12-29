<?php

namespace Misa\Accounting\Infrastructure\Ui\AccountingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Misa\Accounting\Application\Input\Provider\SourceInput;
use Misa\Accounting\Application\Services\Source\FactorySourceInput;
use Misa\Accounting\Domain\Product\Product;
use Misa\Accounting\Domain\Provider\BankDetail\AccountMoney;
use Misa\Accounting\Domain\Provider\BankDetail\AccountNumber;
use Misa\Accounting\Domain\Provider\BankDetail\AccountType;
use Misa\Accounting\Domain\Provider\BankDetail\Bank;
use Misa\Accounting\Domain\Provider\BankDetail\BankAccount;
use Misa\Accounting\Domain\Provider\Information\Email;
use Misa\Accounting\Domain\Provider\Information\Phone;
use Misa\Accounting\Domain\Provider\Product\ProviderProduct;
use Misa\Accounting\Domain\Provider\Provider;
use Misa\Accounting\Domain\Provider\Source\DocumentType;
use Misa\Accounting\Domain\Provider\Source\SourceType;

/**
 * LoadCompanyData Class
 *
 * @package Misa\Accounting\Infrastructure\Ui\AccountingBundle\DataFixtures\ORM
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class LoadProviderData extends AbstractFixture implements OrderedFixtureInterface
{
    use FactorySourceInput;

    const PROVIDER_INFORMATION_ID = 'c9b9ceed-ac6e-41e7-a250-0eaab7f90429';
    const PROVIDER_COMPLETE_ID = '54958337-e3f9-49dd-8285-a3fba5e7c2ea';

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $companyInformation = $this->generateSource(new SourceInput(
            DocumentType::RUC,
            20552196578,
            'Empresa data information',
            'Empresa correos telefono cuenta bancaria',
            'av jr la informacion',
            'PE030407',
            985,
            SourceType::COMPANY
        ));
        $provider = Provider::create($companyInformation, 'jose guillermo', self::PROVIDER_INFORMATION_ID);

        $manager->persist($provider);

        $providerComplete = $this->generatecompleteProvider($manager);
        $manager->persist($providerComplete);

        $manager->flush();
    }


    private function generatecompleteProvider(ObjectManager $manager)
    {
        $companyInformation = $this->generateSource(new SourceInput(
            DocumentType::RUC,
            20552196578,
            'Empresa data completa',
            'Empresa completa',
            'Av las encinas',
            'PE030407',
            985,
            SourceType::COMPANY
        ));
        $provider = Provider::create($companyInformation, 'jose Guillermo Completo', self::PROVIDER_COMPLETE_ID);

        $products = [
            LoadProductData::PRODUCT_1_ID,
            LoadProductData::PRODUCT_2_ID,
            LoadProductData::PRODUCT_3_ID,
            LoadProductData::PRODUCT_4_ID,
            LoadProductData::PRODUCT_5_ID,
        ];

        for ($i = 1; $i <= 5; $i++) {
            $email = Email::create($provider, "abc{$i}@xyz.com");
            $provider->addEmail($email);

            $phone = Phone::create($provider, "(05{$i})741852963");
            $provider->addPhone($phone);

            $product = $manager->find(Product::class, $products[$i - 1]);
            $providerProduct = ProviderProduct::create($provider, $product);
            $provider->addProviderProduct($providerProduct);


            $number = AccountNumber::create("888777999-{$i}", "0365-888777999-{$i}");
            $bank = $manager->find(Bank::class, LoadProviderBankData::BANK_1_ID);
            $bankAccount = BankAccount::create(
                $provider,
                AccountType::CURRENT,
                AccountMoney::SOLES,
                'Jose referencia de cuenta',
                $bank,
                $number
            );
            $provider->addBankAccount($bankAccount);
        }

        return $provider;
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 50;
    }
}
