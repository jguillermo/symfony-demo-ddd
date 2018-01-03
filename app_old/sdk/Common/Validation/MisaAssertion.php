<?php

namespace MisaSdk\Common\Validation;

use Assert\Assertion as BeberleiAssertion;

/**
 * Assertion Class
 *
 * @package MisaSdk\Common\Validation
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class MisaAssertion extends BeberleiAssertion
{
    static protected $exceptionClass = 'MisaSdk\Common\Exception\BadRequest';
}
