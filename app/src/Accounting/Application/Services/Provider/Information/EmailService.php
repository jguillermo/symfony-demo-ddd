<?php

namespace Misa\Accounting\Application\Services\Provider\Information;

use Misa\Accounting\Application\Input\Provider\CollectionEmailInput;
use Misa\Accounting\Application\Input\Provider\EmailInput;
use Misa\Accounting\Application\Services\Provider\FactoryProviderInput;
use Misa\Accounting\Domain\Provider\Information\CollectionEmail;
use Misa\Accounting\Domain\Provider\Information\EmailRepository;
use Misa\Accounting\Domain\Provider\ProviderRepository;
use MisaSdk\Common\Exception\BadRequest;

/**
 * Email Class
 *
 * @package Misa\Accounting\Application\Services\Provider
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class EmailService
{
    use FactoryProviderInput;

    /** @var ProviderRepository */
    private $providerRepository;

    /** @var EmailRepository */
    private $emailRepository;

    /**
     * EmailService constructor.
     * @param ProviderRepository $providerRepository
     * @param EmailRepository $emailRepository
     */
    public function __construct(ProviderRepository $providerRepository, EmailRepository $emailRepository)
    {
        $this->providerRepository = $providerRepository;
        $this->emailRepository = $emailRepository;
    }


    /**
     * @param $providerId
     * @param CollectionEmailInput $emails
     * @return array
     * @throws BadRequest
     */
    public function create($providerId, CollectionEmailInput $emails)
    {
        $provider = $this->providerRepository->findById($providerId);
        if (! $provider) {
            throw new BadRequest("No existe el Proveedor con el id : ".$providerId);
        }
        $ids = $this->addEmails($provider, $emails);
        $this->providerRepository->persist($provider);

        return $ids;
    }

    /**
     * @param $providerId
     * @param $emailId
     * @param EmailInput $emailInput
     * @throws BadRequest
     */
    public function update($providerId, $emailId, EmailInput $emailInput)
    {
        $email = $this->emailRepository->findById($emailId);
        if (! $email) {
            throw new BadRequest("No existe el EMail con el id : ".$emailId);
        }

        $email->changeEmail($emailInput->email());

        $this->emailRepository->persist($email);
    }

    /**
     * @param $providerId
     * @param $emailId
     * @throws BadRequest
     */
    public function delete($providerId, $emailId)
    {
        $email = $this->emailRepository->findById($emailId);
        if (! $email) {
            throw new BadRequest("No existe el EMail con el id : ".$emailId);
        }

        $this->emailRepository->delete($email);
    }


    /**
     * esta la manera correcta de actulizar un entidad
     * se debe refactorizar y trabajr mejor en la clase collectionPersist
     * @param $providerId
     * @param $emailId
     * @param EmailInput $emailInput
     * @throws BadRequest
     */
    private function refactorUpdate($providerId, $emailId, EmailInput $emailInput)
    {
        $provider = $this->providerRepository->findById($providerId);
        if (! $provider) {
            throw new BadRequest("No existe el Proveedor con el id : ".$providerId);
        }
        $collectionEmail = CollectionEmail::create($provider->emails());

        $collectionEmail->changeEmail($emailId, $emailInput);

        $this->providerRepository->persist($provider);
    }
}
