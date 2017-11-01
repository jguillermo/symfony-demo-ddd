<?php

namespace Misa\Accounting\Infrastructure\Ui\AccountingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Misa\Accounting\Domain\Provider\BankDetail\Bank;

/**
 * LoadProviderBankData Class
 *
 * @package Misa\Accounting\Infrastructure\Ui\AccountingBundle\DataFixtures\ORM
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class LoadProviderBankData extends AbstractFixture implements OrderedFixtureInterface
{

    const BANK_1_ID = '22a6272c-8298-48c7-ab4b-111c453deb0c';
    const BANK_2_ID = '3547ac22-453d-457c-ad7d-f1b0c45e680f';

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $bank1 = Bank::create('Banco 1', self::BANK_1_ID);
        $manager->persist($bank1);

        $bank2 = Bank::create('Banco 2', self::BANK_2_ID);
        $manager->persist($bank2);

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 10;
    }
}
