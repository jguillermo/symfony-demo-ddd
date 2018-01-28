<?php

namespace Misa\Accounting\Application\Services\Provider;

use Misa\Accounting\Domain\Product\ItemRepository;
use Misa\Accounting\Domain\Product\ProductRepository;
use Misa\Accounting\Domain\Provider\BankDetail\BankRepository;
use Misa\Accounting\Domain\Provider\ProviderRepository;
use Misa\Accounting\Presentation\Provider\ListPresentation as ProviderListPresentation;
use MisaSdk\Common\Enum\Information\Phone\PhoneType;
use MisaSdk\Common\Exception\BadRequest;

/**
 * ListService Class
 *
 * @package Misa\Accounting\Application\Services\Provider
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class ListService
{
    /** @var BankRepository */
    private $bankRepository;

    /** @var ItemRepository */
    private $itemRepository;

    /** @var ProductRepository */
    private $productRepository;

    /** @var ProviderListPresentation */
    private $providerListPresentation;

    /** @var ProviderRepository */
    private $providerRepository;


    public function __construct(
        BankRepository $bankRepository,
        ItemRepository $itemRepository,
        ProductRepository $productRepository,
        ProviderListPresentation $providerListPresentation,
        ProviderRepository $providerRepository
    ) {
        $this->bankRepository = $bankRepository;
        $this->itemRepository = $itemRepository;
        $this->productRepository = $productRepository;
        $this->providerListPresentation = $providerListPresentation;
        $this->providerRepository = $providerRepository;
    }

    /**
     * @return array
     */
    public function formData()
    {
        $items = $this->itemRepository->findAll();
        $products = $this->productRepository->findAll();
        $banks = $this->bankRepository->findAll();
        $phones = PhoneType::getList();
        return $this->providerListPresentation->formData($items, $products, $banks, $phones);
    }

    public function getById($providerId)
    {
        $provider = $this->providerRepository->findById($providerId);
        if (! $provider) {
            throw new BadRequest("No existe el Proveedor con el id : ".$providerId);
        }
        return $this->providerListPresentation->serializerEncode($provider);
    }
}
