<?php

namespace Misa\Accounting\Domain\Provider\BankDetail;

/**
 * BankRepository Interface
 *
 * @package Misa\Accounting\Domain\Provider\BankDetail
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
interface BankRepository
{
    /**
     * @param $BankId
     * @return Bank
     */
    public function findById($BankId);
}
