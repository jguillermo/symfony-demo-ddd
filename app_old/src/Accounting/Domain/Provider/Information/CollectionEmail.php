<?php

namespace Misa\Accounting\Domain\Provider\Information;

use Misa\Accounting\Application\Input\Provider\EmailInput;
use MisaSdk\Common\Entity\CollectionEntity;

/**
 * CollectionEmail Class
 *
 * @package Misa\Accounting\Domain\Provider\Information
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 *
 * @method static CollectionEmail create (array $c)
 */
class CollectionEmail extends CollectionEntity
{

    public function changeEmail($emailId, EmailInput $emailInput)
    {
        /** @var Email $email */
        foreach ($this->collection as $email) {
            if ($email->id() == $emailId) {
                $email->changeEmail($emailInput->email());
                return true;
            }
        }
        return true;
    }
}
