<?php

namespace MisaSdk\Common\Input;

use MisaSdk\Common\Exception\AppException;

/**
 * AbstractInput Class
 *
 * @package MisaSdk\Common\Input
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class AbstractInput
{
    private $properties;

    protected $createValidate;

    /**
     * verifica si un item se debe validar
     * true cuando se va a crear la entidad
     * true cuando se actualiza la entidad y no es null el parametro
     * false cuando se actualiza y el parametro en null
     * @param $item
     * @return bool
     */
    protected function mustValidate($item)
    {
        return ($this->createValidate || (! $this->createValidate && ! is_null($item)));
    }

    /**
     * @return array
     */
    protected function getArrayData()
    {
        if (is_null($this->properties)) {
            $this->properties = get_object_vars($this);
        }

        return $this->properties;
    }

    public function __call($name, array $arguments = [])
    {
        if (($properties = $this->getArrayData()) && isset($properties[$name])) {
            return $properties[$name];
        }
        return null;
    }

    public function __set($name, $value)
    {
        throw new AppException("Invalid property '$name' with value '$value'");
    }
}
