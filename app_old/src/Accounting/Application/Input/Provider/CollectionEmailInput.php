<?php

namespace Misa\Accounting\Application\Input\Provider;

use MisaSdk\Common\Input\AbstractCollectionInput;

/**
 * CollectionEmailInput Class
 *
 * @package Misa\Accounting\Application\Input\Provider
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 *
 * @method EmailInput[] getCollection()
 */
class CollectionEmailInput extends AbstractCollectionInput
{
    protected function validate($items)
    {
        foreach ($items as $email) {
            if ($this->verifyParams($email)) {
                $this->items[] = new EmailInput($email['email']);
            }
        }
    }

    protected function paramsRequire()
    {
        return ['email'];
    }
}
