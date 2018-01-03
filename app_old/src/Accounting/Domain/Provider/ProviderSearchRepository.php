<?php

namespace Misa\Accounting\Domain\Provider;

/**
 * ProviderSearchRepository Interface
 *
 * @package Misa\Accounting\Domain\Provider
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
interface ProviderSearchRepository
{
    /**
     * @param $q
     * @return array
     */
    public function find($q);

    /**
     * @param Provider $provider
     * @return bool
     */
    public function index(Provider $provider);
}
