<?php

namespace Misa\Accounting\Domain\Provider;

use Misa\Common\Entity\AbstractEntity;

/**
 * Company Class
 *
 * @package Misa\Accounting\Domain\Company
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class Data extends AbstractEntity
{
    /** @var string */
    private $id;

    /** @var string */
    private $ruc;

    /** @var string */
    private $name;

    /** @var  string */
    private $tradeName;

    /** @var string */
    private $address;

    /** @var string */
    private $ubigeo;

    /** @var DataEntity */
    private $dataEntity;


    /**
     * Company constructor.
     * @param string $name
     * @param $ruc
     * @param string $tradeName
     * @param string $address
     * @param string $ubigeo
     * @param DataEntity $dataEntity
     * @param string $id
     * @return Data
     */
    public static function create($name, $ruc, $tradeName, $address, $ubigeo, DataEntity $dataEntity, $id='')
    {
        $company = new self();
        $company->id = self::uuid($id);
        $company->ruc = $ruc;
        $company->name = $name;
        $company->tradeName = $tradeName;
        $company->address = $address;
        $company->ubigeo = $ubigeo;
        $company->dataEntity = $dataEntity;
        return $company;
    }

}