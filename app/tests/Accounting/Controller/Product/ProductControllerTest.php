<?php

namespace MisaTests\Accounting\Controller\Product;

use Misa\Accounting\Domain\Product\Item;
use Misa\Accounting\Domain\Product\Product;
use Misa\Accounting\Infrastructure\Ui\AccountingBundle\DataFixtures\ORM\LoadProductItemData;
use MisaSdk\Common\Test\CodeHttpException;
use MisaSdk\Common\Test\MisaIntegrationTest;

/**
 * ProviderListControllerTest Class
 *
 * @package MisaTests\Accounting\Controller
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class ProductControllerTest extends MisaIntegrationTest
{

    protected function getStaticUrl()
    {
        return 'accounting/product';
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
            'name'=>'producto test 1',
            'item_id'=>LoadProductItemData::ITEM_1_ID,
        ]);

        $this->assertEquals(200,$dataResponse->statusCode());
        $id = $dataResponse->body('id');

        /** @var Product $product */
        $product = $this->em->find(Product::class,$id);
        $this->assertEquals('producto test 1', $product->name());
        $this->assertEquals(LoadProductItemData::ITEM_1_ID, $product->item()->id());

        return $id;
    }

    /**
     * @depends testAddData
     */
    public function testGetById($id)
    {
        $dataResponse = $this->request('GET', $this->getUrl($id));
        $this->assertEquals(200,$dataResponse->statusCode());
        $data = $dataResponse->body();

        /** @var Product $product */
        $product = $this->em->find(Product::class,$id);

        $this->assertEquals($product->id(),$data['id']);
        $this->assertEquals($product->name(),$data['name']);
        $this->assertEquals($product->item()->id(),$data['item_id']);
        $this->assertEquals($product->item()->code(),$data['item_code']);
        $this->assertEquals($product->item()->description(),$data['item_description']);
    }


    /**
     * @depends testAddData
     */
    public function testEditEntity($id)
    {
        $dataResponse = $this->request('PUT', $this->getUrl($id), [
            'name'=>'producto test 1 update',
            'item_id'=>LoadProductItemData::ITEM_2_ID,
        ]);

        $this->assertEquals(200,$dataResponse->statusCode());

        /** @var Product $product */
        $product = $this->em->find(Product::class,$id);
        $this->assertEquals('producto test 1 update', $product->name());
        $this->assertEquals(LoadProductItemData::ITEM_2_ID, $product->item()->id());


        return $id;
    }

    /**
     * @depends testEditEntity
     */
    public function testEditEntity2($id)
    {
        $dataResponse = $this->request('PUT', $this->getUrl($id), [
            'name'=>'producto test 1 update 2',
        ]);

        $this->assertEquals(200,$dataResponse->statusCode());

        /** @var Product $product */
        $product = $this->em->find(Product::class,$id);
        $this->assertEquals('producto test 1 update 2', $product->name());
        $this->assertEquals(LoadProductItemData::ITEM_2_ID, $product->item()->id());



        return $id;
    }

    /**
     * @depends testEditEntity2
     */
    public function testEditEntity3($id)
    {
        $dataResponse = $this->request('PUT', $this->getUrl($id), [
            'item_id'=>LoadProductItemData::ITEM_3_ID,
        ]);

        $this->assertEquals(200,$dataResponse->statusCode());

        /** @var Product $product */
        $product = $this->em->find(Product::class,$id);
        $this->assertEquals('producto test 1 update 2', $product->name());
        $this->assertEquals(LoadProductItemData::ITEM_3_ID, $product->item()->id());

        return $id;
    }

    /**
     * @depends testEditEntity3
     */
    public function testEditEntity4($id)
    {
        $this->expectException(CodeHttpException::class);
        $this->expectExceptionCode(400);
        $dataResponse = $this->request('PUT', $this->getUrl($id), [
            'item_id'=>'no-es-un-uuid-correcto',
        ]);

        return $id;
    }

    /**
     * @depends testEditEntity3
     * @param $id
     */
    public function testDeleteEntity($id)
    {
        $dataResponse = $this->request('DELETE', $this->getUrl($id));
        $this->assertEquals(200,$dataResponse->statusCode());

        /** @var Product $product */
        $product = $this->em->find(Item::class,$id);
        $this->assertEquals(null, $product);
    }

}