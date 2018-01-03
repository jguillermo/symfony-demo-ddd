<?php

namespace Misa\Accounting\Application\Input\Provider;

use MisaSdk\Common\Input\AbstractInput;
use MisaSdk\Common\Validation\MisaAssertion;
use phpDocumentor\Reflection\Types\String_;

/**
 * CreateInput Class
 *
 * @package Misa\Accounting\Domain\Input\Provider
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 *
 * @method string contacName()
 * @method string pageWeb()
 * @method SourceInput source()
 * @method string sourceId()
 * @method CollectionPhoneInput phones()
 * @method CollectionEmailInput emails()
 * @method CollectionBankAccountInput bankAccounts()
 * @method CollectionProductInput providerProducts()
 */
class ProviderInput extends AbstractInput
{
    /** @var string */
    protected $sourceId;

    /** @var  SourceInput */
    protected $source;

    /** @var string */
    protected $contacName;

    /** @var CollectionPhoneInput */
    protected $phones;

    /** @var CollectionEmailInput */
    protected $emails;

    /** @var CollectionBankAccountInput */
    protected $bankAccounts;

    /** @var CollectionProductInput */
    protected $providerProducts;

    /** @var string */
    protected $pageWeb;

    /**
     * CreateInput constructor.
     * @param string $contacName
     * @param $pageWeb
     * @param CollectionPhoneInput $phones
     * @param CollectionEmailInput $emails
     * @param CollectionBankAccountInput $bankAccounts
     * @param CollectionProductInput $providerProducts
     */
    public function __construct(
        $contacName,
        $pageWeb,
        CollectionPhoneInput $phones,
        CollectionEmailInput $emails,
        CollectionBankAccountInput $bankAccounts,
        CollectionProductInput $providerProducts
    ) {

        $this->validate($contacName);

        $this->source = null;
        $this->sourceId = null;
        $this->contacName = $contacName;
        $this->phones = $phones;
        $this->emails = $emails;
        $this->bankAccounts = $bankAccounts;
        $this->providerProducts = $providerProducts;
    }

    /**
     * @param string $sourceId
     */
    public function setSourceId($sourceId)
    {
        $this->sourceId = $sourceId;
    }

    /**
     * @param SourceInput $source
     */
    public function setSource(SourceInput $source)
    {
        $this->source = $source;
    }



    private function validate($contacName)
    {
        $assert = new MisaAssertion();
        $assert::minLength($contacName, 8, "Ingrese el Nombre de contacto de minimo 8 caracteres");
    }
}
