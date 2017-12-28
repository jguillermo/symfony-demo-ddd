<?php

namespace Misa\Accounting\Application\Services\Provider;

use Misa\Accounting\Application\Input\Provider\CollectionEmailInput;
use Misa\Accounting\Application\Input\Provider\CollectionPhoneInput;
use Misa\Accounting\Application\Input\Provider\CollectionProductInput;
use Misa\Accounting\Domain\Product\ProductRepository;
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

    protected function addEmails(Provider $provider, CollectionEmailInput $emails)
    {
        $ids = [];
        if ($emails->count() > 0) {
            foreach ($emails->getCollection() as $rowEmail) {
                $email = Email::create($provider, $rowEmail->email());
                $ids[] = $email->id();
                $provider->addEmail($email);
            }
        }
        return $ids;
    }

    /**
     * @param Provider $provider
     * @param CollectionPhoneInput $phones
     * @return array
     */
    protected function addPhones(Provider $provider, CollectionPhoneInput $phones)
    {
        $ids = [];
        if ($phones->count() > 0) {
            foreach ($phones->getCollection() as $rowPhone) {
                $phone = Phone::create($provider, $rowPhone->number(), $rowPhone->type());
                $ids[] = $phone->id();
                $provider->addPhone($phone);
            }
        }

        return $ids;
    }
}
