<?php

namespace MisaTests\Unit\Common\Enum;

use MisaSdk\Common\Enum\AbstractEnum;

/**
 * EnumFake Class
 *
 * @package MisaTests\Unit\Common\Enum
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2018, Getmin
 */
class EnumFake extends AbstractEnum
{
    const ITEM_1 = 1;
    const ITEM_2 = 2;
    const ITEM_3 = 3;

    public static function gettext($id)
    {
        $data= [
            'ITEM_1' => 'one',
            'ITEM_2' => 'two',
        ];
        return self::getEnumText($id,$data);
    }
}