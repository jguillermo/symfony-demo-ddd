<?php

namespace MisaTests\Unit\Common\Input;

use MisaSdk\Common\Input\AbstractInput;
use MisaSdk\Common\Test\MisaTestCase;


/**
 * MustValidateTest Class
 *
 * @package ${NAMESPACE}
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class MustValidateTest extends MisaTestCase
{
    private function getAbstractInput($createValidate)
    {
        return new class($createValidate) extends AbstractInput{
            public function __construct($createValidate) {
                $this->createValidate = $createValidate;
            }
            public function isvalidate($item)
            {
                return $this->mustValidate($item);
            }

            protected function validate()
            {
                return true;
            }
        };
    }

    public function testValidateCreate()
    {
        $input = $this->getAbstractInput(true);

        $this->assertEquals(true,$input->isvalidate(null));
        $this->assertEquals(true,$input->isvalidate('string'));
        $this->assertEquals(true,$input->isvalidate(1));
        $this->assertEquals(true,$input->isvalidate(0));
        $this->assertEquals(true,$input->isvalidate(''));
        $this->assertEquals(true,$input->isvalidate(true));
        $this->assertEquals(true,$input->isvalidate(false));

    }

    public function testValidateUpdate()
    {
        $input = $this->getAbstractInput(false);

        // solo se deba validar si el campo es diferente a null
        $this->assertEquals(false,$input->isvalidate(null));

        $this->assertEquals(true,$input->isvalidate('string'));
        $this->assertEquals(true,$input->isvalidate(1));
        $this->assertEquals(true,$input->isvalidate(0));
        $this->assertEquals(true,$input->isvalidate(''));
        $this->assertEquals(true,$input->isvalidate(true));
        $this->assertEquals(true,$input->isvalidate(false));

    }
}