<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 2/1/18
 * Time: 1:40 PM
 */

namespace MisaTests\Unit\Util;

use MisaSdk\Common\Test\MisaTestCase;
use MisaSdk\Util\MisaString;

class MisaStringTest extends MisaTestCase
{
    public function testLower()
    {
        $data=[
            'abc123'=>'ABC123',
            'áéíóúñ'=>'ÁÉÍÓÚñ',
            '$%&/()=?'=>'$%&/()=?',
        ];
        foreach ($data as $lower=>$string){
            $this->assertEquals($lower,MisaString::lower($string));
        }
    }

    public function testTrim()
    {
        $data=[
            'abc123'=>' abc123 ',
            'áéíóúñ'=>' áéíóúñ  ',
            '$%&/()=?'=>' $%&/()=? ',
        ];
        foreach ($data as $lower=>$string){
            $this->assertEquals($lower,MisaString::trim($string));
        }
    }
}
