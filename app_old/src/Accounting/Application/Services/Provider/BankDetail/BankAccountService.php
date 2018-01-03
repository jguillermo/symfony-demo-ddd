<?php

namespace Misa\Accounting\Application\Services\Provider\BankDetail;

use Misa\Accounting\Application\Input\Provider\BankAccountInput;
use Misa\Accounting\Application\Input\Provider\CollectionBankAccountInput;
use Misa\Accounting\Domain\Provider\BankDetail\BankAccountRepository;
use Misa\Accounting\Domain\Provider\BankDetail\BankRepository;
use Misa\Accounting\Domain\Provider\ProviderRepository;
use MisaSdk\Common\Exception\BadRequest;

/**
 * BankAccountService Class
 *
 * @package Misa\Accounting\Application\Services\Provider\BankDetail
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class BankAccountService
{
    use FactoryBankAccountInput;

    /** @var ProviderRepository */
    private $providerRepository;

    /** @var BankAccountRepository */
    private $bankAccountRepository;

    /** @var BankRepository */
    private $bankRepository;

    /**
     * BankAccountService constructor.
     * @param ProviderRepository $providerRepository
     * @param BankAccountRepository $bankAccountRepository
     * @param BankRepository $bankRepository
     */
    public function __construct(
        ProviderRepository $providerRepository,
        BankAccountRepository $bankAccountRepository,
        BankRepository $bankRepository
    ) {
        $this->providerRepository = $providerRepository;
        $this->bankAccountRepository = $bankAccountRepository;
        $this->bankRepository = $bankRepository;
    }


    /**
     * @param $providerId
     * @param CollectionBankAccountInput $bankAccounts
     * @return array
     * @throws BadRequest
     */
    public function create($providerId, CollectionBankAccountInput $bankAccounts)
    {
        $provider = $this->providerRepository->findById($providerId);
        if (! $provider) {
            throw new BadRequest("No existe el Proveedor con el id : ".$providerId);
        }
        $ids = $this->addBankAccounts($provider, $bankAccounts, $this->bankRepository);
        $this->providerRepository->persist($provider);

        return $ids;
    }

    /**
     * @param $providerId
     * @param $bankAccountId
     * @param BankAccountInput $bankAccountInput
     * @throws BadRequest
     */
    public function update($providerId, $bankAccountId, BankAccountInput $bankAccountInput)
    {
        $bankAccount = $this->bankAccountRepository->findById($bankAccountId);
        if (! $bankAccount) {
            throw new BadRequest("No existe la cuenta bancaria con el id : ".$bankAccountId);
        }

        $this->updateBankAccount($bankAccount, $bankAccountInput, $this->bankRepository);

        $this->bankAccountRepository->persist($bankAccount);
    }

    /**
     * @param $providerId
     * @param $bankAccountId
     * @throws BadRequest
     */
    public function delete($providerId, $bankAccountId)
    {
        $bankAccount = $this->bankAccountRepository->findById($bankAccountId);
        if (! $bankAccount) {
            throw new BadRequest("No existe el Teléfono con el id : ".$bankAccountId);
        }

        $this->bankAccountRepository->delete($bankAccount);
    }
}
