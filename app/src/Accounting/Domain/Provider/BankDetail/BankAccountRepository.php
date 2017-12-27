<?php

namespace Misa\Accounting\Domain\Provider\BankDetail;

/**
 * BankAccountRepository Interface
 *
 * @package Misa\Accounting\Domain\Provider\Information
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
interface BankAccountRepository
{
    /**
     * @return BankAccount
     */
    public function findById($bankAccountId);

    /**
     * @param BankAccount $bankAccount
     * @return bool
     */
    public function persist(BankAccount $bankAccount);

    /**
     * @param BankAccount $bankAccount
     * @return bool
     */
    public function delete(BankAccount $bankAccount);
}
