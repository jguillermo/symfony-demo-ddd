<?php

namespace Misa\Accounting\Application\Services\Provider\BankDetail;

use Misa\Accounting\Application\Input\Provider\BankAccountInput;
use Misa\Accounting\Application\Input\Provider\CollectionBankAccountInput;
use Misa\Accounting\Domain\Provider\BankDetail\AccountNumber;
use Misa\Accounting\Domain\Provider\BankDetail\BankAccount;
use Misa\Accounting\Domain\Provider\BankDetail\BankRepository;
use Misa\Accounting\Domain\Provider\Provider;
use MisaSdk\Common\Exception\BadRequest;

/**
 * FactoryProvider Trait
 *
 * @package Misa\Accounting\Application\Services\Provider
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
trait FactoryBankAccountInput
{
    protected function addBankAccounts(
        Provider $provider,
        CollectionBankAccountInput $bankAccounts,
        BankRepository $bankRepository
    ) {
        $ids = [];
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
                $ids[] = $bankAccount->id();
                $provider->addBankAccount($bankAccount);
            }
        }
        return $ids;
    }


    protected function updateBankAccount(
        BankAccount $bankAccount,
        BankAccountInput $data,
        BankRepository $bankRepository
    ) {

        if (! is_null($data->bankId())) {
            $bank = $bankRepository->findById($data->bankId());
            if (! $bank) {
                throw new BadRequest("El banco no existe");
            }
            $bankAccount->changeBank($bank);
        }

        if (! is_null($data->number())) {
            $bankAccount->number()->changeNumber($data->number());
        }

        if (! is_null($data->numberInterbank())) {
            $bankAccount->number()->changeInterbank($data->numberInterbank());
        }

        if (! is_null($data->money())) {
            $bankAccount->changeMoney($data->money());
        }

        if (! is_null($data->type())) {
            $bankAccount->changeType($data->type());
        }

        if (! is_null($data->holderName())) {
            $bankAccount->changeHolderName($data->holderName());
        }

        return;
    }
}
