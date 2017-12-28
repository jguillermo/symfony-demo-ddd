<?php

namespace Misa\Accounting\Infrastructure\SearchEngine\Solr;

use Misa\Accounting\Domain\Provider\Source\SearchRepository as CompanySearchRepository;
use Misa\Accounting\Domain\Provider\Source\Source;
use MisaSdk\Common\Adapter\Persistence\Solr\AbstractSolrRepository;

/**
 * CompanySolrRepository Class
 *
 * @package Misa\Accounting\Infrastructure\SearchEngine\Solr
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class CompanySolrRepository extends AbstractSolrRepository implements CompanySearchRepository
{

    /**
     * @inheritdoc
     */
    public function find($q)
    {
        $select = $this->getSelect([
            'handler' => 'select-free-search',
            'fields' => 'company_id, document_type, document_number, name, trade_name, address, entity_id, entity_name, ubigeo_id'
        ]);
        $select->setQuery($q);
        $resultset = $this->client->select($select);
        return $this->toArray($resultset);
    }

    /**
     * @inheritdoc
     */
    public function index(Source $company)
    {
        $data = [
            'company_id' => $company->id(),
            'document_type' => $company->dataDocument()->type(),
            'document_number' => $company->dataDocument()->number(),
            'name' => $company->name(),
            'trade_name' => $company->tradeName(),
            'address' => $company->address(),
            'entity_id' => $company->dataEntity()->id(),
            'entity_name' => $company->dataEntity()->name(),
            'ubigeo_id' => $company->ubigeo(),
            'ubigeo_name' => $company->ubigeo(),
        ];

        $this->update($data);
        return true;
    }
}
