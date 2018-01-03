<?php

namespace Misa\Accounting\Application\Services\Provider\Information;

use Misa\Accounting\Application\Input\Provider\CollectionPhoneInput;
use Misa\Accounting\Application\Input\Provider\PhoneInput;
use Misa\Accounting\Application\Services\Provider\FactoryProviderInput;
use Misa\Accounting\Domain\Provider\Information\PhoneRepository;
use Misa\Accounting\Domain\Provider\ProviderRepository;
use MisaSdk\Common\Exception\BadRequest;

/**
 * Email Class
 *
 * @package Misa\Accounting\Application\Services\Provider
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class PhoneService
{
    use FactoryProviderInput;

    /** @var ProviderRepository */
    private $providerRepository;

    /** @var PhoneRepository */
    private $phoneRepository;

    /**
     * PhoneService constructor.
     * @param ProviderRepository $providerRepository
     * @param PhoneRepository $phoneRepository
     */
    public function __construct(ProviderRepository $providerRepository, PhoneRepository $phoneRepository)
    {
        $this->providerRepository = $providerRepository;
        $this->phoneRepository = $phoneRepository;
    }


    /**
     * @param $providerId
     * @param CollectionPhoneInput $phones
     * @return array
     * @throws BadRequest
     */
    public function create($providerId, CollectionPhoneInput $phones)
    {
        $provider = $this->providerRepository->findById($providerId);
        if (! $provider) {
            throw new BadRequest("No existe el Proveedor con el id : ".$providerId);
        }
        $ids = $this->addPhones($provider, $phones);
        $this->providerRepository->persist($provider);

        return $ids;
    }

    /**
     * @param $providerId
     * @param $phoneId
     * @param PhoneInput $phoneInput
     * @throws BadRequest
     */
    public function update($providerId, $phoneId, PhoneInput $phoneInput)
    {
        $phone = $this->phoneRepository->findById($phoneId);
        if (! $phone) {
            throw new BadRequest("No existe el Teléfono con el id : ".$phoneId);
        }

        if (! is_null($phoneInput->type())) {
            $phone->changeType($phoneInput->type());
        }

        if (! is_null($phoneInput->number())) {
            $phone->changeNumber($phoneInput->number());
        }

        $this->phoneRepository->persist($phone);
    }

    /**
     * @param $providerId
     * @param $phoneId
     * @throws BadRequest
     */
    public function delete($providerId, $phoneId)
    {
        $phone = $this->phoneRepository->findById($phoneId);
        if (! $phone) {
            throw new BadRequest("No existe el Teléfono con el id : ".$phoneId);
        }

        $this->phoneRepository->delete($phone);
    }
}
