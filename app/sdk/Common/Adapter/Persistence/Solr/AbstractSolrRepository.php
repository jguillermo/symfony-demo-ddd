<?php

namespace MisaSdk\Common\Adapter\Persistence\Solr;

use Solarium\Client;
use Solarium\QueryType\Select\Result\Result;

/**
 * SolrRepository Class
 *
 * @package MisaSdk\Common\Adapter\Persistence\Solr
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class AbstractSolrRepository
{
    /** @var Client */
    protected $client;

    /**
     * AbstractSolrRepository constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $options
     * @return \Solarium\QueryType\Select\Query\Query
     */
    protected function getSelect(array $options = [])
    {
        return $this->client->createSelect($options);
    }

    /**
     * @param null $options
     * @return \Solarium\QueryType\Update\Query\Query
     */
    protected function getUpdate($options = null)
    {
        return $this->client->createUpdate($options);
    }

    protected function update(array $params){
        $update = $this->getUpdate();
        $document = $update->createDocument($params);
        $update->addDocument($document);
        $update->addCommit();
        $this->getClient()->update($update);
    }

    /**
     * @return Client
     */
    protected function getClient()
    {
        return $this->client;
    }

    /**
     * @param Result $result
     * @return array
     */
    protected function toArray(Result $result)
    {
        $data = $result->getData();
        return [
            'total' => $data['response']['numFound'],
            'items' => $data['response']['docs'],
        ];
    }

    /**
     * @param $where
     * @param null $limit
     * @param null $order
     * @return \Solarium\QueryType\Suggester\Result\Result
     */
    public function suggesterBy($where, $limit = null, $order = null)
    {
        $key = key($where);
        $value = $where[$key];

        $select = $this->getSelect();
        $select->setQuery("$key:(*$value*)");

        $limit && $select->setStart(0)->setRows($limit);
        $order && $select->addSorts($order);


        return $this->getClient()->suggester($select);
    }
}
