<?php

namespace MisaSdk\Common\Entity;

/**
 * AbstractEntity Class
 *
 * @package MisaSdk\Common\Entity
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
abstract class AbstractEntity
{
    const EMPTY_ID = '';
    /**
     * @param string $id
     * @return MisaUuid
     */
    public static function uuid($id = self::EMPTY_ID)
    {
        return new MisaUuid($id);
    }
}
