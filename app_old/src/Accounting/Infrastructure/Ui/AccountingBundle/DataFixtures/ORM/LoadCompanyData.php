<?php

namespace Misa\Accounting\Infrastructure\Ui\AccountingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Misa\Accounting\Application\Input\Provider\SourceInput;
use Misa\Accounting\Application\Services\Source\FactorySourceInput;
use Misa\Accounting\Domain\Provider\Source\DocumentType;
use Misa\Accounting\Domain\Provider\Source\SourceType;

/**
 * LoadCompanyData Class
 *
 * @package Misa\Accounting\Infrastructure\Ui\AccountingBundle\DataFixtures\ORM
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class LoadCompanyData extends AbstractFixture implements OrderedFixtureInterface
{
    use FactorySourceInput;

    const COMPANY_1_ID = '0965777f-c47d-442f-b609-f68b5dbc0b98';
    const COMPANY_2_ID = '835ede27-7e5c-4b31-8384-1c31cef7a19e';

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $company1 = $this->generateSource(new SourceInput(
            DocumentType::RUC,
            123456789,
            'Empresa 9',
            'Empresa nueve',
            'Av 9 de diciembre',
            'PE010103',
            15,
            SourceType::COMPANY
        ), self::COMPANY_1_ID);
        $manager->persist($company1);

        $company2 = $this->generateSource(new SourceInput(
            DocumentType::RUC,
            20552196578,
            'Empresa 11',
            'Empresa once',
            'Av 11 de octubre',
            'PE010300',
            985,
            SourceType::COMPANY
        ), self::COMPANY_2_ID);
        $manager->persist($company2);

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 40;
    }
}
