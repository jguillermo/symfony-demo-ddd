<?php

namespace Misa\Accounting\Application\Input\Provider;

use MisaSdk\Common\Input\AbstractCollectionInput;

/**
 * PhonesInput Class
 *
 * @package Misa\Accounting\Application\Input\Provider
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 *
 * @method PhoneInput[] getCollection()
 */
class CollectionPhoneInput extends AbstractCollectionInput
{

    protected function validate($items)
    {
        foreach ($items as $phone) {
            if ($this->verifyParams($phone)) {
                $this->items[] = new PhoneInput($phone['number'], $phone['type']);
            }
        }
    }

    protected function paramsRequire()
    {
        return ['number','type'];
    }
}
