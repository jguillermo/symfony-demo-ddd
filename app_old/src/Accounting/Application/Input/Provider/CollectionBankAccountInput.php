<?php

namespace Misa\Accounting\Application\Input\Provider;

use MisaSdk\Common\Input\AbstractCollectionInput;

/**
 * CollectionBankAccountInput Class
 *
 * @package Misa\Accounting\Application\Input\Provider
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 *
 * @method BankAccountInput[] getCollection()
 */
class CollectionBankAccountInput extends AbstractCollectionInput
{

    protected function validate($items)
    {
        foreach ($items as $item) {
            if ($this->verifyParams($item)) {
                $this->items[] = new BankAccountInput(
                    $item['type'],
                    $item['money'],
                    $item['holder_name'],
                    $item['bank_id'],
                    $item['number'],
                    $item['number_interbank']
                );
            }
        }
    }

    protected function paramsRequire()
    {
        return ['type','money','holder_name','bank_id','number','number_interbank'];
    }
}
