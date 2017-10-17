<?php

namespace Misa\Accounting\Domain\Provider\Information;

use Misa\Accounting\Domain\Provider\Provider;
use MisaSdk\Common\Entity\AbstractEntity;

/**
 * Email Class
 *
 * @package Misa\Accounting\Domain\Provider\Information
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class Email extends AbstractEntity
{
    /** @var string */
    private $id;

    /** @var string */
    private $email;

    /** @var Provider */
    private $provider;

    /**
     * @param $email
     * @param string $id
     * @return Email
     */
    public static function create($email, $id = self::EMPTY_ID)
    {
        $emailObj = new self();
        $emailObj->id = self::uuid($id)->getId();
        $emailObj->email = $email;
        return $emailObj;
    }
}
