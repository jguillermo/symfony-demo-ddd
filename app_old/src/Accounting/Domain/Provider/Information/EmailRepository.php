<?php

namespace Misa\Accounting\Domain\Provider\Information;

/**
 * EmailRepository Interface
 *
 * @package Misa\Accounting\Domain\Provider\Information
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
interface EmailRepository
{
    /**
     * @return Email
     */
    public function findById($emailId);

    /**
     * @param Email $email
     * @return bool
     */
    public function persist(Email $email);

    /**
     * @param Email $email
     * @return bool
     */
    public function delete(Email $email);
}
