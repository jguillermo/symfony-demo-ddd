<?php

namespace Misa\Accounting\Domain\Provider;

/**
 * ProviderRepository Interface
 *
 * @package Misa\Accounting\Domain\Provider
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
interface ProviderRepository
{
    /**
     * @param $providerId
     * @return Provider
     */
    public function findById($providerId);

    /**
     * @param Provider $provider
     * @return bool
     */
    public function persist(Provider $provider);
}
