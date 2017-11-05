<?php

namespace Misa\Accounting\Domain\Provider\Source;

use Misa\Accounting\Domain\Provider\Provider;
use MisaSdk\Common\Entity\AbstractEntity;
use MisaSdk\Common\Entity\MisaToArray;

/**
 * Company Class
 *
 * @package Misa\Accounting\Domain\Company
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class Source extends AbstractEntity implements MisaToArray
{
    /** @var string */
    private $id;

    /** @var SourceDocument */
    private $dataDocument;

    /** @var string */
    private $name;

    /** @var  string */
    private $tradeName;

    /** @var string */
    private $address;

    /** @var string */
    private $ubigeo;

    /** @var SourceEntity */
    private $dataEntity;

    /**
     * Company constdataDocumenttor.
     * @param string $name
     * @param $dataDocument
     * @param string $tradeName
     * @param string $address
     * @param string $ubigeo
     * @param SourceEntity $dataEntity
     * @param string $id
     * @return Source
     */
    public static function create(
        $name,
        SourceDocument $dataDocument,
        $tradeName,
        $address,
        $ubigeo,
        SourceEntity $dataEntity,
        $id = self::EMPTY_ID
    ) {
        $company = new self();
        $company->id = self::uuid($id)->getId();
        $company->dataDocument = $dataDocument;
        $company->name = $name;
        $company->tradeName = $tradeName;
        $company->address = $address;
        $company->ubigeo = $ubigeo;
        $company->dataEntity = $dataEntity;
        return $company;
    }

    /**
     * @return SourceDocument
     */
    public function dataDocument()
    {
        return $this->dataDocument;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function tradeName()
    {
        return $this->tradeName;
    }


    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'trade_name' => $this->tradeName,
            'document_number' => $this->dataDocument->number()
        ];
    }
}
