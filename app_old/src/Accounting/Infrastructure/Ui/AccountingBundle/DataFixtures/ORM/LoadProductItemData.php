<?php

namespace Misa\Accounting\Infrastructure\Ui\AccountingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Misa\Accounting\Domain\Product\Item;

/**
 * LoadProductItemData Class
 *
 * @package Misa\Accounting\Infrastructure\Ui\AccountingBundle\DataFixtures\ORM
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class LoadProductItemData extends AbstractFixture implements OrderedFixtureInterface
{
    const ITEM_1_ID = '99b53dae-da9b-4fb2-be6d-a71faff4a655';
    const ITEM_2_ID = 'cd37c9a9-2e16-46bf-a431-77a6b04cdb5b';
    const ITEM_3_ID = '30570c52-abcf-487a-97bc-0fb562a79095';
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $item1 = Item::create('Item 1', 6518, self::ITEM_1_ID);
        $manager->persist($item1);

        $item2 = Item::create('Item 2', 2154, self::ITEM_2_ID);
        $manager->persist($item2);

        $item3 = Item::create('Item 3', 7515, self::ITEM_3_ID);
        $manager->persist($item3);

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 20;
    }
}
