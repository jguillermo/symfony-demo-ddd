<?php

namespace Misa\Accounting\Application\Services\Provider;

use Misa\Accounting\Application\Event\Provider\MngEvent as ProviderMngEvent;
use Misa\Accounting\Application\Services\Provider\BankDetail\FactoryBankAccountInput;
use Misa\Accounting\Application\Services\Source\FactorySourceInput;
use Misa\Accounting\Domain\Provider\Provider;
use Misa\Accounting\Application\Input\Provider\ProviderInput;
use Misa\Accounting\Domain\Product\ProductRepository;
use Misa\Accounting\Domain\Provider\BankDetail\BankRepository;
use Misa\Accounting\Domain\Provider\ProviderRepository;
use Misa\Accounting\Domain\Provider\Source\SourceRepository;
use MisaSdk\Common\Exception\BadRequest;

/**
 * MngService Class
 *
 * @package Misa\Accounting\Application\Services\Provider
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class MngService
{
    use FactoryProviderInput;
    use FactorySourceInput;
    use FactoryBankAccountInput;

    /** @var BankRepository */
    private $bankRepository;

    /** @var ProductRepository */
    private $productRepository;

    /** @var ProviderRepository */
    private $providerRepository;

    /** @var ProviderMngEvent */
    private $providerMngEvent;

    /** @var SourceRepository */
    private $sourceRepository;


    /**
     * MngService constructor.
     * @param BankRepository $bankRepository
     * @param ProductRepository $productRepository
     * @param ProviderRepository $providerRepository
     * @param ProviderMngEvent $providerMngEvent
     * @param SourceRepository $sourceRepository
     */
    public function __construct(
        BankRepository $bankRepository,
        ProductRepository $productRepository,
        ProviderRepository $providerRepository,
        ProviderMngEvent $providerMngEvent,
        SourceRepository $sourceRepository
    ) {
        $this->bankRepository = $bankRepository;
        $this->productRepository = $productRepository;
        $this->providerRepository = $providerRepository;
        $this->providerMngEvent = $providerMngEvent;
        $this->sourceRepository = $sourceRepository;
    }


    public function create(ProviderInput $data)
    {
        if ($data->sourceId()) {
            $source = $this->sourceRepository->findById($data->sourceId());
            if (! $source) {
                throw new BadRequest("Error no existe la empresa con el id :".$data->sourceId());
            }
        } else {
            $source = $this->generateSource($data->source());
        }


        $provider = Provider::create($source, $data->contacName());
        $provider->changePageWeb($data->pageWeb());

        $this->addPhones($provider, $data->phones());
        $this->addEmails($provider, $data->emails());
        $this->addBankAccounts($provider, $data->bankAccounts(), $this->bankRepository);
        $this->addProviderProducts($provider, $data->providerProducts(), $this->productRepository);

        $this->providerRepository->persist($provider);

        $this->providerMngEvent->create($provider);

        return $provider->id();
    }
}
