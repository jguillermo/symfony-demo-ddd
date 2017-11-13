<?php

namespace Misa\Accounting\Application\Services\Source;

use Misa\Accounting\Application\Input\Provider\SourceInput;
use Misa\Accounting\Domain\Provider\Source\SourceRepository;
use MisaSdk\Common\Exception\BadRequest;

/**
 * MngService Class
 *
 * @package Misa\Accounting\Application\Services\Company
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class MngService
{
    use FactorySourceInput;

    /** @var SourceRepository */
    private $sourceRepository;

    /**
     * MngService constructor.
     * @param SourceRepository $sourceRepository
     */
    public function __construct(SourceRepository $sourceRepository)
    {
        $this->sourceRepository = $sourceRepository;
    }

    /**
     * @param SourceInput $sourceInput
     * @return string
     */
    public function create(SourceInput $sourceInput)
    {
        $source = $this->generateSource($sourceInput);
        $this->sourceRepository->create($source);
        return $source->id();
    }

    /**
     * @param $sourceId
     * @param SourceInput $sourceInput
     * @return string
     * @throws BadRequest
     */
    public function update($sourceId, SourceInput $sourceInput)
    {
        $source = $this->sourceRepository->findById($sourceId);

        if (is_null($source)) {
            throw new BadRequest("No existe la empresa con id: {$sourceId}");
        }

        $this->updateSource($source, $sourceInput);

        $this->sourceRepository->update($source);
        return $source->id();
    }
}
