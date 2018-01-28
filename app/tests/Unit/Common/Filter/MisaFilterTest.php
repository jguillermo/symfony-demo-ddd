<?php

namespace MisaTests\Unit\Common\Filter;

use DateTime;
use MisaSdk\Common\Filter\MisaFilter;
use MisaSdk\Common\Test\MisaTestCase;

class MisaFilterTest extends MisaTestCase
{

    public function testBoolTrue()
    {
        $dataTrue=[
            'true',
            '1',
            '123',
            'on',
            1,
            15,
            15.5,
        ];

        foreach ($dataTrue as $value){
            $this->assertTrue(MisaFilter::bool($value));
        }

    }

    public function testBoolFalse()
    {
        $dataFalse=[
            '0',
            'false',
            'off',
            null,
        ];

        foreach ($dataFalse as $value){
            $this->assertFalse(MisaFilter::bool($value));
        }
    }

    public function testNullOrBool()
    {
        $this->assertTrue(is_null(MisaFilter::nullOrBool(null)));
    }

    public function testFloat()
    {
        $data=[
            [null,0.0],
            ['on',0.0],
            ['',0.0],
            ['1',1.0],
            ['-1',-1.0],
            ['15',15.0],
            ['-15',-15.0],
            ['15.5',15.5],
            ['-15.5',-15.5],
            [2,2.0],
            [-2,-2.0],
            [12,12.0],
            [-12,-12.0],
            [12.5,12.5],
            [-12.5,-12.5],
        ];
        foreach ($data as $row){
            $this->assertTrue(is_float(MisaFilter::float($row[0])));
            $this->assertEquals($row[1],MisaFilter::float($row[0]));
        }

        $this->assertTrue(is_null(MisaFilter::nullOrFloat(null)));
    }

    public function testCurrent()
    {
        $data=[
            [null,-1.0],
            ['on',-1.0],
            ['',-1.0],
            ['-15.0',-1.0],
            ['1',1.0],
            ['15',15.0],
            ['15.5',15.5],
            [2,2.0],
            [12,12.0],
            [12.5,12.5],
            [-150,-1.0],
            [-150.25,-1.0],
            [-0.01,-1.0],
            [-1,-1.0],
        ];
        foreach ($data as $row){
            $this->assertTrue(is_float(MisaFilter::current($row[0])));
            $this->assertEquals($row[1],MisaFilter::current($row[0]));
        }

        $this->assertTrue(is_null(MisaFilter::nullOrCurrent(null)));
    }

    public function testInt()
    {
        $data=[
            [null,0],
            ['on',0],
            ['1',1],
            ['15',15],
            ['15.5',15],
            [2,2],
            [12,12],
            [12.5,12],
        ];
        foreach ($data as $row){
            $this->assertTrue(is_int(MisaFilter::int($row[0])));
            $this->assertEquals($row[1],MisaFilter::int($row[0]));
        }

        $this->assertTrue(is_null(MisaFilter::nullOrInt(null)));
    }

    public function testTrim()
    {
        $this->assertEquals('ábc',MisaFilter::trim(' ábc '));
        $this->assertTrue(is_null(MisaFilter::nullOrTrim(null)));
    }

    public function testdate()
    {

        $data=[
            [null,"-0001"],
            [true,"-0001"],
            [false,"-0001"],
            ['on',"-0001"],
            ['1',"-0001"],
            ['15',"-0001"],
            ['15.5',"-0001"],
            [2,"-0001"],
            [12,"-0001"],
            [12.5,"-0001"],
            ['2018-05-45',"-0001"],
            ['2018-45-05',"-0001"],
            ['2018-45-45',"-0001"],
            ['2018-05-15 gdgser',"-0001"],
            ['2018-05-15 24',"-0001"],
            ['2018-05-15 15',"-0001"],
            ['2018-05-15 24:00',"-0001"],
            ['2018-05-15 24:00:00',"-0001"],
            ['2018-05-15 23:61:00',"-0001"],
            ['2018-05-15 23:59:61',"-0001"],
            ['2018-05-15 23:15',"2018"],
            ['2018-05-15 23:15:15',"2018"],
        ];

        foreach ($data as $row){
            $this->assertTrue(MisaFilter::date($row[0]) instanceof DateTime );
            $this->assertEquals($row[1], MisaFilter::date($row[0])->format('Y'));
        }

        $this->assertTrue(is_null(MisaFilter::nullOrDate(null)));
    }
}
