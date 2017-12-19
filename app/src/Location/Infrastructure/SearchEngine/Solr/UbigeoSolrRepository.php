<?php

namespace Misa\Location\Infrastructure\SearchEngine\Solr;

use Misa\Location\Domain\Ubigeo\SearchRepository;
use MisaSdk\Common\Adapter\Persistence\Solr\AbstractSolrRepository;

/**
 * UbigeoSolrRepository Class
 *
 * @package Misa\Location\Infrastructure\SearchEngine\Solr
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class UbigeoSolrRepository extends AbstractSolrRepository implements SearchRepository
{

    /**
     * @param $q
     * @return array
     */
    public function find($q)
    {
        $select = $this->getSelect([
            'handler' => 'select-free-search',
            'fields' => 'full_name, ubigeo_id'
        ]);
        $select->setQuery($q);
        $resultset = $this->client->select($select);
        return $this->toArray($resultset);
    }
}
