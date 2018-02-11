<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 2/9/18
 * Time: 2:57 PM
 */

namespace Misa\Accounting\Infrastructure\Ui\AccountingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Misa\Accounting\Domain\Payment\DocumentType;

class LoadPaymentDocumentType extends AbstractFixture implements OrderedFixtureInterface
{

    const DOCUMENT_TYPE_1_ID = '231a8628-aa72-4bf0-890f-40d77550af12';
    const DOCUMENT_TYPE_2_ID = '0e791add-54d3-4626-b7b6-0982582db797';
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $documentType1 = DocumentType::create('Factura', self::DOCUMENT_TYPE_1_ID);
        $manager->persist($documentType1);

        $documentType2 = DocumentType::create('Boleta', self::DOCUMENT_TYPE_2_ID);
        $manager->persist($documentType2);

        $manager->flush();
    }

    public function getOrder()
    {
        return 100;
    }
}
