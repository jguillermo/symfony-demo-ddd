<?php

namespace Misa\Accounting\Infrastructure\Ui\AccountingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Misa\Accounting\Application\Input\Provider\SourceInput;
use Misa\Accounting\Application\Services\Source\FactorySourceInput;
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

        $manager->flush();
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
