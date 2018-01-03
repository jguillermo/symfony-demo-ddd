<?php

namespace Misa\Accounting\Domain\Provider\Source;

/**
 * SearchRepository Interface
 *
 * @package Misa\Accounting\Domain\Provider\Source
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

    /**
     * @param Source $source
     * @return bool
     */
    public function index(Source $source);
}
