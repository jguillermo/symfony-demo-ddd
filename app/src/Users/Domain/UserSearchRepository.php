<?php

namespace Misa\Accounting\Domain;

/**
 * UserSearch Interface
 *
 * @package Misa\Accounting\Domain
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
interface UserSearchRepository
{
    /**
     * @param array $filter
     * @return array
     */
    public function listAll($filter);
}