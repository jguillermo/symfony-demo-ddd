<?php

namespace Misa\Accounting\Application\Services\Source;

use Misa\Accounting\Application\Event\Company\MngEvent as CompanyMngEvent;
use Misa\Accounting\Application\Input\Provider\SourceInput;
use Misa\Accounting\Domain\Provider\Source\SourceRepository;
use MisaSdk\Common\Exception\BadRequest;
use phpDocumentor\Reflection\Types\String_;

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

    /** @var CompanyMngEvent */
    private $companyMngEvent;

    public function __construct(SourceRepository $sourceRepository, CompanyMngEvent $companyMngEvent)
    {
        $this->sourceRepository = $sourceRepository;
        $this->companyMngEvent = $companyMngEvent;
    }

    /**
     * @param SourceInput $sourceInput
     * @return string
     */
    public function create(SourceInput $sourceInput)
    {
        $source = $this->generateSource($sourceInput);
        $this->sourceRepository->create($source);

        $this->companyMngEvent->persist($source);
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
        $this->companyMngEvent->persist($source);
        return $source->id();
    }
}
