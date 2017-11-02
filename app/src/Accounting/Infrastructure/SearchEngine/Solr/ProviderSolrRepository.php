<?php

namespace Misa\Accounting\Infrastructure\SearchEngine\Solr;

use Misa\Accounting\Domain\Provider\Provider;
use Misa\Accounting\Domain\Provider\ProviderSearchRepository;
use MisaSdk\Common\Adapter\Persistence\Solr\AbstractSolrRepository;

/**
 * ProviderSolrRepository Class
 *
 * @package Misa\Accounting\Infrastructure\SearchEngine\Solr
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class ProviderSolrRepository extends AbstractSolrRepository implements ProviderSearchRepository
{
    /**
     * @inheritdoc
     */
    public function find($q)
    {
        $select = $this->client->createSelect([
            'handler' => 'select-free-search',
            'fields' => 'source_name, source_trade_name, source_document_number, provider_contac_name, provider_products, provider_items'
            ]);
        $select->setQuery($q);
        $resultset = $this->client->select($select);
        return $this->toArray($resultset);
    }

    /**
     * @inheritdoc
     */
    public function index(Provider $provider)
    {
        return true;
    }
}
