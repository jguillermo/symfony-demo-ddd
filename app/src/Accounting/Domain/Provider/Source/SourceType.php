<?php

namespace Misa\Accounting\Domain\Provider\Source;

use MisaSdk\Common\Enum\AbstractEnum;

/**
 * DataType Class
 *
 * @package Misa\Accounting\Domain\Provider
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class SourceType extends AbstractEnum
{
    const COMPANY = 'company';
    const USER = 'user';
}
