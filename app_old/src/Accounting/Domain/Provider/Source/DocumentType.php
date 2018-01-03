<?php

namespace Misa\Accounting\Domain\Provider\Source;

use MisaSdk\Common\Enum\AbstractEnum;

/**
 * DocumentType Class
 *
 * @package Misa\Accounting\Domain\Provider\Data
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class DocumentType extends AbstractEnum
{
    const RUC = 'ruc';
    const DNI = 'dni';
}
