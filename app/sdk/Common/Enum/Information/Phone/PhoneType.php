<?php

namespace MisaSdk\Common\Enum\Information\Phone;

use MisaSdk\Common\Enum\AbstractEnum;

/**
 * PhoneType Class
 *
 * @package MisaSdk\Common\Enum\Information\Phone
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class PhoneType extends AbstractEnum
{
    const LANDLINE = 1;
    const CELL_PHONE = 2;
    const RPM = 3;
    const RPC = 4;
    const ENTEL = 5;
    const BITEL = 6;

    public static function label()
    {
        return [
            'LANDLINE' => 'Teléfono Fijo',
            'CELL_PHONE' => 'Celular',
            'RPM' => 'Rpm',
            'RPC' => 'Rpc',
            'ENTEL' => 'Entel',
            'BITEL' => 'Bitel',
        ];
    }
}
