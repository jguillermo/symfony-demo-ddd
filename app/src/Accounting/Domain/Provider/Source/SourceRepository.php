<?php

namespace Misa\Accounting\Domain\Provider\Source;

/**
 * SourceRepository Interface
 *
 * @package Misa\Accounting\Domain\Provider\Source
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
interface SourceRepository
{
    /**
     * @param Source $source
     * @return bool
     */
    public function create(Source $source);

    /**
     * @param Source $source
     * @return bool
     */
    public function update(Source $source);

    /**
     * @param $sourceId
     * @return Source
     */
    public function findById($sourceId);
}
