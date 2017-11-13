<?php

namespace Misa\Accounting\Infrastructure\Ui\AccountingBundle\Controller;

use Misa\Accounting\Application\Input\Provider\SourceInput;
use Misa\Accounting\Application\Services\Source\MngService as SourceMngService;
use Misa\Accounting\Domain\Provider\Source\DocumentType;
use MisaSdk\Common\Controller\Controller;
use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * CompaniesController Class
 *
 * @package Misa\Accounting\Infrastructure\Ui\AccountingBundle\Controller
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class CompaniesController extends Controller
{

    /** @var SourceMngService */
    private $sourceMngService;

    /**
     * CompaniesController constructor.
     * @param SourceMngService $sourceMngService
     */
    public function __construct(SourceMngService $sourceMngService)
    {
        $this->sourceMngService = $sourceMngService;
    }


    /**
     * @Route("/companies", name="accounting_companies_create")
     * @Method({"POST"})
     * @param Request $request
     * @param LoggerInterface $logger
     * @return JsonResponse
     */
    public function createCompaniesAction(Request $request, LoggerInterface $logger)
    {
        $logger->info('create Company');

        $id = $this->sourceMngService->create(new SourceInput(
            DocumentType::RUC,
            $request->get('data_document_number'),
            $request->get('name'),
            $request->get('trade_name'),
            $request->get('address'),
            $request->get('ubigeo'),
            $request->get('data_entity_id'),
            $request->get('data_entity_name')
        ));

        return new JsonResponse(['id' => $id]);
    }

    /**
     * @Route("/companies/{companyId}", name="accounting_companies_update")
     * @Method({"PUT"})
     * @param $companyId
     * @param Request $request
     * @param LoggerInterface $logger
     * @return JsonResponse
     */
    public function updateCompaniesAction($companyId, Request $request, LoggerInterface $logger)
    {
        $logger->info('update Company');

        $this->sourceMngService->update($companyId, new SourceInput(
            DocumentType::RUC,
            $request->get('data_document_number'),
            $request->get('name'),
            $request->get('trade_name'),
            $request->get('address'),
            $request->get('ubigeo'),
            $request->get('data_entity_id'),
            $request->get('data_entity_name'),
            false
        ));

        return new JsonResponse(['ok']);
    }
}
