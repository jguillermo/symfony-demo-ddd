<?php

namespace Misa\Accounting\Domain\Provider\Information;

/**
 * PhoneRepository Interface
 *
 * @package Misa\Accounting\Domain\Provider\Information
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
interface PhoneRepository
{
    /**
     * @return Phone
     */
    public function findById($phoneId);

    /**
     * @param Phone $phone
     * @return bool
     */
    public function persist(Phone $phone);

    /**
     * @param Phone $phone
     * @return bool
     */
    public function delete(Phone $phone);
}
