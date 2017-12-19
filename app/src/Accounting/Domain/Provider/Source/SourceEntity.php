<?php

namespace Misa\Accounting\Domain\Provider\Source;

use MisaSdk\Common\Exception\BadRequest;

/**
 * DataEntity Class
 *
 * @package Misa\Accounting\Domain\Provider
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class SourceEntity
{
    /** @var string */
    private $id;

    /** @var string */
    private $name;

    /**
     * DataEntity constructor.
     * @param string $name
     * @param string $id
     * @return SourceEntity
     * @throws BadRequest
     */
    public static function create($name, $id = '')
    {

        $dataEntity = new self();
        $dataEntity->changeName($name);
        $dataEntity->id = $id;

        return $dataEntity;
    }

    /**
     * @param string $id
     */
    public function changeId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $name
     * @throws BadRequest
     */
    public function changeName($name)
    {
        if (! SourceType::isValidValue($name)) {
            throw new BadRequest("El tipo de entidad no es corecto {$name}: [".SourceType::COMPANY.",".SourceType::USER."]");
        }
        $this->name = $name;
    }
}
