<?php

namespace Misa\Accounting\Infrastructure\Ui\AccountingBundle\Controller;

use Misa\Accounting\Application\Input\Provider\BankAccountInput;
use Misa\Accounting\Application\Input\Provider\CollectionBankAccountInput;
use Misa\Accounting\Application\Services\Provider\BankDetail\BankAccountService as ProviderBankAccountService;
use MisaSdk\Common\Controller\Controller;
use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * ProviderInformationPhoneController Class
 *
 * @package Misa\Accounting\Infrastructure\Ui\AccountingBundle\Controller
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 * @Route("/providers/{providerId}/bank-account")
 */
class ProviderBankAccountController extends Controller
{
    /** @var ProviderBankAccountService */
    private $providerBankAccountService;

    /**
     * ProviderPhoneController constructor.
     * @param ProviderBankAccountService $providerBankAccountService
     */
    public function __construct(ProviderBankAccountService $providerBankAccountService)
    {
        $this->providerBankAccountService = $providerBankAccountService;
    }


    /**
     * @Route("", name="accounting_providers_bank_account_create")
     * @Method({"POST"})
     * @param $providerId
     * @param Request $request
     * @param LoggerInterface $logger
     * @return JsonResponse
     */
    public function createProviderPhoneAction($providerId, Request $request, LoggerInterface $logger)
    {
        $logger->info('create Company');

        $ids = $this->providerBankAccountService->create($providerId, new CollectionBankAccountInput([[
            'type' => $request->get('type'),
            'money' => $request->get('money'),
            'holder_name' => $request->get('holder_name'),
            'bank_id' => $request->get('bank_id'),
            'number' => $request->get('number'),
            'number_interbank' => $request->get('number_interbank'),
            ]]));

        return new JsonResponse(['id' => array_shift($ids)]);
    }

    /**
     * @Route("/{bankAccountId}", name="accounting_providers_bank_account_update")
     * @Method({"PUT"})
     * @param $providerId
     * @param $bankAccountId
     * @param Request $request
     * @param LoggerInterface $logger
     * @return JsonResponse
     */
    public function updateProviderPhoneAction($providerId, $bankAccountId, Request $request, LoggerInterface $logger)
    {
        $logger->info('update Bank Account');

        $this->providerBankAccountService->update($providerId, $bankAccountId, new BankAccountInput(
            $request->get('type'),
            $request->get('money'),
            $request->get('holder_name'),
            $request->get('bank_id'),
            $request->get('number'),
            $request->get('number_interbank')
        ));

        return new JsonResponse(['ok']);
    }


    /**
     * @Route("/{bankAccountId}", name="accounting_providers_bank_account_delete")
     * @Method({"DELETE"})
     * @param $providerId
     * @param $bankAccountId
     * @param Request $request
     * @param LoggerInterface $logger
     * @return JsonResponse
     */
    public function deleteProviderPhoneAction($providerId, $bankAccountId, Request $request, LoggerInterface $logger)
    {
        $logger->info('create Company');

        $this->providerBankAccountService->delete($providerId, $bankAccountId);

        return new JsonResponse(['ok']);
    }
}
