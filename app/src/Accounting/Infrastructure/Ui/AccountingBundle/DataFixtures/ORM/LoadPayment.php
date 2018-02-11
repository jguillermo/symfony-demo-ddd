<?php

namespace Misa\Accounting\Infrastructure\Ui\AccountingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Misa\Accounting\Domain\Payment\AmountType;
use Misa\Accounting\Domain\Payment\DocumentType;
use Misa\Accounting\Domain\Payment\Payment;
use Misa\Accounting\Domain\Payment\Type;
use Misa\Accounting\Domain\Product\Product;

/**
 * LoadPayment Class
 *
 * @package Misa\Accounting\Infrastructure\Ui\AccountingBundle\DataFixtures\ORM
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2018, Getmin
 */
class LoadPayment extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $product1 = $manager->find(Product::class, LoadProductData::PRODUCT_1_ID);
        $product2 = $manager->find(Product::class, LoadProductData::PRODUCT_2_ID);
        $product5 = $manager->find(Product::class, LoadProductData::PRODUCT_5_ID);
        $documentType = $manager->find(DocumentType::class, LoadPaymentDocumentType::DOCUMENT_TYPE_1_ID);
        $paymentType = $manager->find(Type::class, LoadPaymentType::TYPE_1_ID);


        $payment1 = Payment::create(
            $product1,
            new \DateTime('2018-02-11'),
            $documentType,
            '123',
            $paymentType,
            150.00,
            AmountType::SOLES,
            '987654'
        );
        $manager->persist($payment1);

        $payment2 = Payment::create(
            $product2,
            new \DateTime('2018-02-11'),
            $documentType,
            '456',
            $paymentType,
            200.00,
            AmountType::SOLES,
            '987654'
        );
        $manager->persist($payment2);

        $payment3 = Payment::create(
            $product5,
            new \DateTime('2018-02-11'),
            $documentType,
            '741',
            $paymentType,
            50.00,
            AmountType::DOLLAR,
            '987654'
        );
        $manager->persist($payment3);

        $manager->flush();
    }




    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 150;
    }
}
