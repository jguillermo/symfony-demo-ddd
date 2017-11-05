<?php
/**
 * MisaInflector Class
 *
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
namespace MisaSdk\Common\Service;

use FOS\RestBundle\Inflector\InflectorInterface;
use Doctrine\Common\Inflector\Inflector;
use MisaSdk\Common\Enum\Information\Phone\PhoneType;

class MisaInflector implements InflectorInterface
{
    public function pluralize($word)
    {
        $pluralize = [
            'authenticate' => 'authenticate',
            'ubigeo' => 'ubigeo',
        ];
        if (isset($pluralize[$word])) {
            return $pluralize[$word];
        } else {
            return Inflector::pluralize($word);
        }
    }
}
