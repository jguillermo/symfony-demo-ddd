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
use Misa\Accounting\Application\Services\Provider\SearchService as ProviderSearchService;
use MisaSdk\Common\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ProvidersController extends Controller
{
    /** @var ProviderMngService */
    private $providerMngService;

    /** @var  ProviderListService */
    private $providerListService;

    /** @var ProviderSearchService */
    private $providerSearchService;

    /**
     * ProvidersController constructor.
     * @param ProviderMngService $providerMngService
     * @param ProviderListService $providerListService
     * @param ProviderSearchService $providerSearchService
     */
    public function __construct(
        ProviderMngService $providerMngService,
        ProviderListService $providerListService,
        ProviderSearchService $providerSearchService
    ) {
        $this->providerMngService = $providerMngService;
        $this->providerListService = $providerListService;
        $this->providerSearchService = $providerSearchService;
    }

    /**
     * @Route("/providers", name="accounting_providers_create")
     * @Method({"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function createProvidersAction(Request $request)
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

    /**
     * @Route("/providers/loadform", name="accounting_providers_loadform")
     * @Method({"GET"})
     * @return JsonResponse
     */
    public function loadformProvidersAction()
    {
        return new JsonResponse($this->providerListService->formData());
    }

    /**
     * @Route("/providers/search", name="accounting_providers_search")
     * @Method({"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function searchProvidersAction(Request $request)
    {
        $q = $request->query->get('q', '');
        return new JsonResponse($this->providerSearchService->freeSearch($q));
    }
}
