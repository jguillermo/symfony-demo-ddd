<?php

namespace MisaSdk\Common\Input;

use MisaSdk\Common\Exception\BadRequest;

/**
 * AbstractCollectionInput Class
 *
 * @package MisaSdk\Common\Input
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
abstract class AbstractCollectionInput
{
    /** @var array */
    protected $items;

    /**
     * AbstractCollectionInput constructor.
     * @param array $items
     */
    public function __construct(array $items)
    {
        $this->items = [];
        $this->validate($items);
    }

    /**
     * @return array
     */
    public function getCollection()
    {
        return $this->items;
    }

    public function count()
    {
        return count($this->items);
    }

    abstract protected function validate($items);

    protected function isScalar($item, $label = '')
    {
        if (! is_scalar($item)) {
            throw new BadRequest("El parámetro {$label} no es correcto");
        }

        return true;
    }

    /**
     * @param $params
     * @return bool
     * @throws BadRequest
     */
    protected function verifyParams($params)
    {
        foreach ($this->paramsRequire() as $item) {
            if (! isset($params[$item])) {
                throw new BadRequest('Error no existe el parametro :'.$item);
            }
        }
        return true;
    }

    /**
     * retornar las parametros que deben existir en cada row
     * @return array
     */
    protected function paramsRequire()
    {
        return [];
    }
}
