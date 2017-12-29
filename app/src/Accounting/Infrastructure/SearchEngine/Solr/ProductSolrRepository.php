<?php

namespace Misa\Accounting\Infrastructure\SearchEngine\Solr;

use Misa\Accounting\Domain\Product\Product;
use Misa\Accounting\Domain\Product\ProductSearchRepository;
use MisaSdk\Common\Adapter\Persistence\Solr\AbstractSolrRepository;

/**
 * ProductSolrRepository Class
 *
 * @package Misa\Accounting\Infrastructure\SearchEngine\Solr
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class ProductSolrRepository extends AbstractSolrRepository implements ProductSearchRepository
{

    /**
     * @inheritdoc
     */
    public function find($q)
    {
        $select = $this->getSelect([
            'handler' => 'select-free-search',
            'fields' => 'product_id, name, item_description, item_code'
        ]);
        $select->setQuery($q);
        $resultset = $this->client->select($select);
        return $this->toArray($resultset);
    }

    /**
     * @inheritdoc
     */
    public function index(Product $product)
    {
        $data = [
            'product_id' => $product->id(),
            'name' => $product->name(),
            'item_description' => $product->item()->description(),
            'item_code' => $product->item()->code(),
        ];

        $this->update($data);
        return true;
    }
}
