<?php

namespace Misa\Accounting\Application\Services\Provider;

use Misa\Accounting\Application\Input\Provider\CollectionBankAccountInput;
use Misa\Accounting\Application\Input\Provider\CollectionEmailInput;
use Misa\Accounting\Application\Input\Provider\CollectionPhoneInput;
use Misa\Accounting\Application\Input\Provider\CollectionProductInput;
use Misa\Accounting\Domain\Product\ProductRepository;
use Misa\Accounting\Domain\Provider\BankDetail\AccountNumber;
use Misa\Accounting\Domain\Provider\BankDetail\BankAccount;
use Misa\Accounting\Domain\Provider\BankDetail\BankRepository;
use Misa\Accounting\Domain\Provider\Information\Email;
use Misa\Accounting\Domain\Provider\Information\Phone;
use Misa\Accounting\Domain\Provider\Product\ProviderProduct;
use Misa\Accounting\Domain\Provider\Provider;
use MisaSdk\Common\Exception\BadRequest;

/**
 * FactoryProvider Trait
 *
 * @package Misa\Accounting\Application\Services\Provider
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
trait FactoryProviderInput
{

    protected function addProviderProducts(
        Provider $provider,
        CollectionProductInput $products,
        ProductRepository $productRepository
    ) {
        if ($products->count() > 0) {
            foreach ($products->getCollection() as $productId) {
                $product = $productRepository->findById($productId);
                if (! $product) {
                    throw new BadRequest("El producto no existe");
                }
                $providerProduct = ProviderProduct::create($provider, $product);
                $provider->addProviderProduct($providerProduct);
            }
        }
    }


    protected function addBankAccounts(
        Provider $provider,
        CollectionBankAccountInput $bankAccounts,
        BankRepository $bankRepository
    ) {
        if ($bankAccounts->count() > 0) {
            foreach ($bankAccounts->getCollection() as $rowBankAccount) {
                $bank = $bankRepository->findById($rowBankAccount->bankId());
                if (! $bank) {
                    throw new BadRequest("El banco no existe");
                }

                $number = AccountNumber::create($rowBankAccount->number(), $rowBankAccount->numberInterbank());

                $bankAccount = BankAccount::create(
                    $provider,
                    $rowBankAccount->type(),
                    $rowBankAccount->money(),
                    $rowBankAccount->holderName(),
                    $bank,
                    $number
                );
                $provider->addBankAccount($bankAccount);
            }
        }
    }

    protected function addEmails(Provider $provider, CollectionEmailInput $emails)
    {
        if ($emails->count() > 0) {
            foreach ($emails->getCollection() as $rowEmail) {
                $email = Email::create($provider, $rowEmail->email());
                $provider->addEmail($email);
            }
        }
    }

    protected function addPhones(Provider $provider, CollectionPhoneInput $phones)
    {
        if ($phones->count() > 0) {
            foreach ($phones->getCollection() as $rowPhone) {
                $phone = Phone::create($provider, $rowPhone->number(), $rowPhone->type());
                $provider->addPhone($phone);
            }
        }
    }
}
