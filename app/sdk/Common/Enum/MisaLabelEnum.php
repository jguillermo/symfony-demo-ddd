<?php

namespace MisaSdk\Common\Enum;

/**
 * MisaLabelEnum Interface
 *
 * @package MisaSdk\Common\Enum
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2018, Getmin
 */
interface MisaLabelEnum
{
    /**
     * return [
     *    'DOLLAR' => 'Dólares',
     *    'SOLES' => 'Soles',
     * ];
     * @return array
     */
    public static function label();

    /**
     * @param $id
     * @return string
     */
    public static function getLabel($id);

    /**
     * @return array
     */
    public static function getList();

    /**
     * @return array
     */
    public static function getArrayList();
}
