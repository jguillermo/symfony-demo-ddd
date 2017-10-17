<?php

namespace Misa\Accounting\Application\Input\Provider;

use MisaSdk\Common\Input\AbstractInput;

/**
 * SourceInput Class
 *
 * @package Misa\Accounting\Application\Input\Provider
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 *
 * @method string dataDocumentType()
 * @method string dataDocumentNumber()
 * @method string name()
 * @method string tradeName()
 * @method string address()
 * @method string ubigeo()
 * @method string dataEntityId()
 * @method string dataEntityName()
 */
class SourceInput extends AbstractInput
{
    /** @var string */
    protected $dataDocumentType;

    /** @var string */
    protected $dataDocumentNumber;

    /** @var string */
    protected $name;

    /** @var  string */
    protected $tradeName;

    /** @var string */
    protected $address;

    /** @var string */
    protected $ubigeo;

    /** @var string */
    protected $dataEntityId;

    /** @var  string */
    protected $dataEntityName;

    /**
     * SourceInput constructor.
     * @param string $dataDocumentType
     * @param string $dataDocumentNumber
     * @param string $name
     * @param string $tradeName
     * @param string $address
     * @param string $ubigeo
     * @param string $dataEntityId
     * @param string $dataEntityName
     */
    public function __construct(
        $dataDocumentType,
        $dataDocumentNumber,
        $name,
        $tradeName,
        $address,
        $ubigeo,
        $dataEntityId,
        $dataEntityName
    ) {
        $this->dataDocumentType = $dataDocumentType;
        $this->dataDocumentNumber = $dataDocumentNumber;
        $this->name = $name;
        $this->tradeName = $tradeName;
        $this->address = $address;
        $this->ubigeo = $ubigeo;
        $this->dataEntityId = $dataEntityId;
        $this->dataEntityName = $dataEntityName;
    }
}
