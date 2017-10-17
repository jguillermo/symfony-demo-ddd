<?php

namespace Misa\Accounting\Domain\Provider\Source;

/**
 * DataDocument Class
 *
 * @package Misa\Accounting\Domain\Provider\Data
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class SourceDocument
{
    /** @var string */
    private $type;

    /** @var string */
    private $number;

    /**
     * DataDocument constructor.
     * @param string $type
     * @param string $number
     * @return SourceDocument
     */
    public static function create($type, $number)
    {
        $dataDocument = new self();
        $dataDocument->type = $type;
        $dataDocument->number = $number;
        return $dataDocument;
    }
}
