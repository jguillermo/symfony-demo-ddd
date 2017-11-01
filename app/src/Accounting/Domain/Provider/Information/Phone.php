<?php

namespace Misa\Accounting\Domain\Provider\Information;

use Misa\Accounting\Domain\Provider\Provider;
use MisaSdk\Common\Entity\AbstractEntity;
use MisaSdk\Common\Enum\Information\Phone\PhoneType;
use MisaSdk\Common\Exception\BadRequest;

/**
 * Phone Class
 *
 * @package Misa\Accounting\Domain\Provider\Information
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class Phone extends AbstractEntity
{
    /** @var string */
    private $id;

    /** @var string */
    private $number;

    /** @var int */
    private $type;

    /** @var  Provider */
    private $provider;

    /**
     * @param Provider $provider
     * @param $number
     * @param int $type
     * @param string $id
     * @return Phone
     * @throws BadRequest
     */
    public static function create(Provider $provider, $number, $type = PhoneType::CELL_PHONE, $id = '')
    {
        if (! PhoneType::isValidValue($type)) {
            throw new BadRequest("El tipo de teléfono no es corecto");
        }

        $phone = new self();
        $phone->id = self::uuid($id)->getId();
        $phone->number = $number;
        $phone->type = $type;
        $phone->provider = $provider;

        return $phone;
    }
}
