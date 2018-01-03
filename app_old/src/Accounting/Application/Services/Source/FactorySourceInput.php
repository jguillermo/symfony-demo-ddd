<?php

namespace Misa\Accounting\Application\Services\Source;

use Misa\Accounting\Application\Input\Provider\SourceInput;
use Misa\Accounting\Domain\Provider\Source\Source;
use Misa\Accounting\Domain\Provider\Source\SourceDocument;
use Misa\Accounting\Domain\Provider\Source\SourceEntity;

/**
 * FactorySourceInput Trait
 *
 * @package Misa\Accounting\Application\Services\Source
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
trait FactorySourceInput
{
    /**
     * @param SourceInput $data
     * @param string $sourceId
     * @return Source
     */
    protected function generateSource(SourceInput $data, $sourceId = Source::EMPTY_ID)
    {
        $dataDocument = SourceDocument::create(
            $data->dataDocumentType(),
            $data->dataDocumentNumber()
        );

        $dataEntity = SourceEntity::create($data->dataEntityName(), $data->dataEntityId());

        return  Source::create(
            $data->name(),
            $dataDocument,
            $data->tradeName(),
            $data->address(),
            $data->ubigeo(),
            $dataEntity,
            $sourceId
        );
    }


    protected function updateSource(Source $source, SourceInput $data)
    {
        if (! is_null($data->dataDocumentType())) {
            $source->dataDocument()->changeType($data->dataDocumentType());
        }
        if (! is_null($data->dataDocumentNumber())) {
            $source->dataDocument()->changeNumber($data->dataDocumentNumber());
        }

        if (! is_null($data->dataEntityId())) {
            $source->dataEntity()->changeId($data->dataEntityId());
        }
        if (! is_null($data->dataEntityName())) {
            $source->dataEntity()->changeName($data->dataEntityName());
        }

        if (! is_null($data->name())) {
            $source->changeName($data->name());
        }
        if (! is_null($data->tradeName())) {
            $source->changeTradeName($data->tradeName());
        }
        if (! is_null($data->address())) {
            $source->changeAddress($data->address());
        }
        if (! is_null($data->ubigeo())) {
            $source->changeUbigeo($data->ubigeo());
        }

        return;
    }
}
