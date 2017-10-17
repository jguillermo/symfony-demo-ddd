<?php

namespace Misa\Accounting\Domain\Provider;

use Misa\Common\Util\AbstractEnum;

/**
 * DataType Class
 *
 * @package Misa\Accounting\Domain\Provider
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class DataType extends AbstractEnum
{
    const COMPANY = 'company';
    const USER = 'user';
}