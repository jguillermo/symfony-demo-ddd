<?php

namespace Misa\Accounting\Domain\Provider;

use Misa\Accounting\Domain\Provider\BankDetail\BankAccount;
use Misa\Accounting\Domain\Provider\Information\Email;
use Misa\Accounting\Domain\Provider\Information\Phone;
use Misa\Accounting\Domain\Provider\Product\ProviderProduct;
use Misa\Accounting\Domain\Provider\Source\Source;
use MisaSdk\Common\Entity\AbstractEntity;

/**
 * Provider Class
 *
 * @package Misa\Accounting\Domain\Provider
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class Provider extends AbstractEntity
{
    /** @var string */
    private $id;

    /** @var  Source */
    private $source;

    /** @var Phone[] */
    private $phones;

    /** @var Email[] */
    private $emails;

    /** @var string */
    private $contacName;

    /** @var BankAccount[] */
    private $bankAccounts;

    /** @var ProviderProduct[] */
    private $providerProducts;

    /**
     * @param Source $source
     * @param $contacName
     * @param string $id
     * @return Provider
     */
    public static function create(Source $source, $contacName, $id = self::EMPTY_ID)
    {
        $provider = new self();
        $provider->id = self::uuid($id)->getId();
        $provider->source = $source;
        $provider->phones = [];
        $provider->emails = [];
        $provider->contacName = $contacName;
        $provider->bankAccounts = [];
        $provider->providerProducts = [];
        return $provider;
    }

    /**
     * @param Phone $phone
     * @return Provider
     */
    public function addPhone(Phone $phone)
    {
        $this->phones[] = $phone;
        return $this;
    }

    /**
     * @param Email $email
     * @return Provider
     */
    public function addEmail(Email $email)
    {
        $this->emails[] = $email;
        return $this;
    }

    /**
     * @param BankAccount $bankAccount
     * @return Provider
     */
    public function addBankAccount(BankAccount $bankAccount)
    {
        $this->bankAccounts[] = $bankAccount;
        return $this;
    }

    /**
     * @param ProviderProduct $providerProduct
     * @return Provider
     */
    public function addProviderProduct(ProviderProduct $providerProduct)
    {
        $this->providerProducts[] = $providerProduct;
        return $this;
    }
}
