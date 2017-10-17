<?php

namespace Misa\Accounting\Domain\Provider;

use Misa\Common\Exception\BadRequest;

/**
 * DataEntity Class
 *
 * @package Misa\Accounting\Domain\Provider
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class DataEntity
{
    /** @var string */
    private $id;

    /** @var string */
    private $name;

    /**
     * DataEntity constructor.
     * @param string $name
     * @param string $id
     * @return DataEntity
     * @throws BadRequest
     */
    public function create($name, $id = '')
    {
        if(!DataType::isValidKey($name)){
            throw new BadRequest("El tipo de dato no es corecto");
        }
        $dataEntity = new self();
        $dataEntity->id = $id;
        $dataEntity->name = $name;
        return $dataEntity;
    }


}