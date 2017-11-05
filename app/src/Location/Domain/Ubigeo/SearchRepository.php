<?php

namespace Misa\Location\Domain\Ubigeo;

/**
 * SearchRepository Interface
 *
 * @package Misa\Location\Domain\Ubigeo
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
interface SearchRepository
{
    /**
     * @param $q
     * @return array
     */
    public function find($q);
}