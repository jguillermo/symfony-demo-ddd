<?php

namespace Misa\Accounting\Infrastructure\Ui\AccountingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Misa\Accounting\Domain\Product\Item;
use Misa\Accounting\Domain\Product\Product;

/**
 * LoadProductData Class
 *
 * @package Misa\Accounting\Infrastructure\Ui\AccountingBundle\DataFixtures\ORM
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class LoadProductData extends AbstractFixture implements OrderedFixtureInterface
{
    const PRODUCT_1_ID = 'e21e5085-5a60-40f4-8bd5-c1d1134e6302';
    const PRODUCT_2_ID = '59f20421-1492-4a13-abe6-4ddc8b0ce986';
    const PRODUCT_3_ID = 'f4569bac-539f-4329-a7a1-8df281a0f164';
    const PRODUCT_4_ID = 'b669c851-6290-422d-a820-4b39a6f029dd';
    const PRODUCT_5_ID = 'f03b0609-2bfe-451c-a531-a5e77f137bac';
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $item1 = $manager->find(Item::class, LoadProductItemData::ITEM_1_ID);
        $item2 = $manager->find(Item::class, LoadProductItemData::ITEM_2_ID);
        $item3 = $manager->find(Item::class, LoadProductItemData::ITEM_3_ID);

        $product1 = Product::create('Producto 1', $item1, self::PRODUCT_1_ID);
        $manager->persist($product1);

        $product2 = Product::create('Producto 2', $item2, self::PRODUCT_2_ID);
        $manager->persist($product2);

        $product3 = Product::create('Producto 3', $item3, self::PRODUCT_3_ID);
        $manager->persist($product3);

        $product4 = Product::create('Producto 4', $item1, self::PRODUCT_4_ID);
        $manager->persist($product4);

        $product5 = Product::create('Producto 5', $item2, self::PRODUCT_5_ID);
        $manager->persist($product5);

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 30;
    }
}
