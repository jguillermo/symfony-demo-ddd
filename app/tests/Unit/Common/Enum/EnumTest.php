<?php

namespace MisaTests\Unit\Common\Enum;
use Misa\Accounting\Domain\Payment\AmountType;
use MisaSdk\Common\Test\MisaTestCase;

/**
 * EnumTest Class
 *
 * @package MisaTests\Unit\Common\Enum
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2018, Getmin
 */
class EnumTest extends MisaTestCase
{
    public function testText()
    {
        $this->assertEquals('one',EnumFake::gettext(EnumFake::ITEM_1));
        $this->assertEquals('two',EnumFake::gettext(EnumFake::ITEM_2));
        $this->assertEquals('',EnumFake::gettext(EnumFake::ITEM_3));
        $this->assertEquals('',EnumFake::gettext(4));
    }
}