<?php

namespace Misa\Accounting\Application\Input\Provider;

use MisaSdk\Common\Input\AbstractInput;

/**
 * CreateInput Class
 *
 * @package Misa\Accounting\Domain\Input\Provider
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 *
 * @method string contacName()
 * @method SourceInput source()
 * @method CollectionPhoneInput phones()
 * @method CollectionEmailInput emails()
 * @method CollectionBankAccountInput bankAccounts()
 * @method CollectionProductInput providerProducts()
 */
class ProviderInput extends AbstractInput
{
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

    /**
     * CreateInput constructor.
     * @param SourceInput $source
     * @param string $contacName
     * @param CollectionPhoneInput $phones
     * @param CollectionEmailInput $emails
     * @param CollectionBankAccountInput $bankAccounts
     * @param CollectionProductInput $providerProducts
     */
    public function __construct(
        SourceInput $source,
        $contacName,
        CollectionPhoneInput $phones,
        CollectionEmailInput $emails,
        CollectionBankAccountInput $bankAccounts,
        CollectionProductInput $providerProducts
    ) {
        $this->source = $source;
        $this->contacName = $contacName;
        $this->phones = $phones;
        $this->emails = $emails;
        $this->bankAccounts = $bankAccounts;
        $this->providerProducts = $providerProducts;
    }
}
