<?php

namespace MisaSdk\Common\Entity;

use MisaSdk\Common\Exception\AppException;
use Ramsey\Uuid\Uuid;

/**
 * Euid Class
 *
 * @package MisaSdk\Common\Entity
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class MisaUuid
{
    private $id;

    /**
     * Euid constructor.
     * @param string $id
     * @throws AppException
     */
    public function __construct($id = '')
    {
        $this->setId($id);
    }

    /**
     * @param $id
     * @throws AppException
     */
    private function setId($id)
    {
        if (! is_string($id)) {
            throw new AppException("el id debe ser un string");
        }
        if ($id == "") {
            $this->id = Uuid::uuid4()->toString();
        } else {
            if (! Uuid::isValid($id)) {
                throw new AppException("el id debe ser del tipo uuid");
            }
            $this->id = $id;
        }
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
}
