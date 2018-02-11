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
use Misa\Accounting\Domain\Payment\Type;

class LoadPaymentType extends AbstractFixture implements OrderedFixtureInterface
{

    const TYPE_1_ID = '8cfa24ac-9c67-4eb0-9b27-0a6720b5d610';
    const TYPE_2_ID = 'e3b2a648-c066-4e08-ab45-884172dfd513';
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $documentType1 = Type::create('Transferencia', self::TYPE_1_ID);
        $manager->persist($documentType1);

        $documentType2 = Type::create('cheque', self::TYPE_2_ID);
        $manager->persist($documentType2);

        $manager->flush();
    }

    public function getOrder()
    {
        return 120;
    }
}
