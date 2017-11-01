<?php

namespace Misa\Accounting\Application\Services\Provider;

use Misa\Accounting\Domain\Product\ItemRepository;
use Misa\Accounting\Domain\Product\ProductRepository;
use Misa\Accounting\Domain\Provider\BankDetail\BankRepository;
use Misa\Accounting\Presentation\Provider\ListPresentation as ProviderListPresentation;
use MisaSdk\Common\Enum\Information\Phone\PhoneType;

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

    /**
     * ListService constructor.
     * @param BankRepository $bankRepository
     * @param ItemRepository $itemRepository
     * @param ProductRepository $productRepository
     * @param ProviderListPresentation $providerListPresentation
     */
    public function __construct(
        BankRepository $bankRepository,
        ItemRepository $itemRepository,
        ProductRepository $productRepository,
        ProviderListPresentation $providerListPresentation
    ) {
        $this->bankRepository = $bankRepository;
        $this->itemRepository = $itemRepository;
        $this->productRepository = $productRepository;
        $this->providerListPresentation = $providerListPresentation;
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
}
