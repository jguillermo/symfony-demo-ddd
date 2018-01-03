<?php

namespace MisaTests\Accounting\Controller\Product;

use Misa\Accounting\Domain\Product\Item;
use MisaSdk\Common\Test\CodeHttpException;
use MisaSdk\Common\Test\MisaIntegrationTest;

/**
 * ProviderListControllerTest Class
 *
 * @package MisaTests\Accounting\Controller
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class ProductItemControllerTest extends MisaIntegrationTest
{

    protected function getStaticUrl()
    {
        return 'accounting/product-items';
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
            'description'=>'item ingresado en el test',
            'code'=>'56ts',
        ]);

        $this->assertEquals(200,$dataResponse->statusCode());
        $id = $dataResponse->body('id');

        /** @var Item $item */
        $item = $this->em->find(Item::class,$id);
        $this->assertEquals('item ingresado en el test', $item->description());
        $this->assertEquals('56ts', $item->code());

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

        /** @var Item $item */
        $item = $this->em->find(Item::class,$id);
        $this->assertEquals($item->id(),$data['id']);
        $this->assertEquals($item->description(),$data['description']);
        $this->assertEquals($item->code(),$data['code']);
    }

    /**
     * @depends testAddData
     */
    public function testEditEntity($id)
    {
        $dataResponse = $this->request('PUT', $this->getUrl($id), [
            'description'=>'item editado en el test',
            'code'=>'56edit',
        ]);

        $this->assertEquals(200,$dataResponse->statusCode());

        /** @var Item $item */
        $item = $this->em->find(Item::class,$id);
        $this->assertEquals('item editado en el test', $item->description());
        $this->assertEquals('56edit', $item->code());

        return $id;
    }

    /**
     * @depends testEditEntity
     */
    public function testEditEntity2($id)
    {
        $dataResponse = $this->request('PUT', $this->getUrl($id), [
            'code'=>'56edit2',
        ]);

        $this->assertEquals(200,$dataResponse->statusCode());

        /** @var Item $item */
        $item = $this->em->find(Item::class,$id);
        $this->assertEquals('item editado en el test', $item->description());
        $this->assertEquals('56edit2', $item->code());

        return $id;
    }

    /**
     * @depends testEditEntity2
     */
    public function testEditEntity3($id)
    {
        $dataResponse = $this->request('PUT', $this->getUrl($id), [
            'description'=>'item editado2 en el test',
        ]);

        $this->assertEquals(200,$dataResponse->statusCode());

        /** @var Item $item */
        $item = $this->em->find(Item::class,$id);
        $this->assertEquals('item editado2 en el test', $item->description());
        $this->assertEquals('56edit2', $item->code());

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

        /** @var Item $item */
        $item = $this->em->find(Item::class,$id);
        $this->assertEquals(null, $item);
    }

}