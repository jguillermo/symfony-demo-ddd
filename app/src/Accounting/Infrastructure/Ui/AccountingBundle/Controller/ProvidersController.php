<?php

namespace Misa\Accounting\Infrastructure\Ui\AccountingBundle\Controller;

use Misa\Accounting\Application\Input\Provider\CollectionBankAccountInput;
use Misa\Accounting\Application\Input\Provider\CollectionEmailInput;
use Misa\Accounting\Application\Input\Provider\CollectionPhoneInput;
use Misa\Accounting\Application\Input\Provider\CollectionProductInput;
use Misa\Accounting\Application\Input\Provider\ProviderInput;
use Misa\Accounting\Application\Input\Provider\SourceInput;
use Misa\Accounting\Application\Services\Provider\ListService as ProviderListService;
use Misa\Accounting\Application\Services\Provider\MngService as ProviderMngService;
use MisaSdk\Common\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ProvidersController extends Controller
{
    /** @var ProviderMngService */
    private $providerMngService;

    /** @var  ProviderListService */
    private $providerListService;

    /**
     * ProvidersController constructor.
     * @param ProviderMngService $providerMngService
     * @param ProviderListService $providerListService
     */
    public function __construct(ProviderMngService $providerMngService, ProviderListService $providerListService)
    {
        $this->providerMngService = $providerMngService;
        $this->providerListService = $providerListService;
    }


    public function postProvidersAction(Request $request)
    {
        $id = $this->providerMngService->create(new ProviderInput(
            new SourceInput(
                $request->get('source_data_document_type'),
                $request->get('source_data_document_number'),
                $request->get('source_name'),
                $request->get('source_trade_name'),
                $request->get('source_address'),
                $request->get('source_ubigeo'),
                $request->get('source_data_entity_id'),
                $request->get('source_data_entity_name')
            ),
            $request->get('provider_contac_name'),
            new CollectionPhoneInput($request->get('phones', [])),
            new CollectionEmailInput($request->get('emails', [])),
            new CollectionBankAccountInput($request->get('bank_accounts', [])),
            new CollectionProductInput($request->get('products_id', []))
        ));
        return new JsonResponse(['id' => $id]);
    }

    public function loadformProvidersAction()
    {
        return new JsonResponse($this->providerListService->formData());
    }
}
