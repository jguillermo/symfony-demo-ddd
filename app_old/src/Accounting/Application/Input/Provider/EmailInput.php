<?php

namespace Misa\Accounting\Application\Input\Provider;

use MisaSdk\Common\Input\AbstractInput;

/**
 * EmailInput Class
 *
 * @package Misa\Accounting\Application\Input\Provider
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 *
 * @method email()
 */
class EmailInput extends AbstractInput
{
    /** @var string */
    protected $email;

    /**
     * EmailInput constructor.
     * @param string $email
     */
    public function __construct($email)
    {
        $this->email = $email;
    }
}
