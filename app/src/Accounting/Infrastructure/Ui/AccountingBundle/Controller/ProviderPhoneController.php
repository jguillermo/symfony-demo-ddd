<?php

namespace Misa\Accounting\Infrastructure\Ui\AccountingBundle\Controller;

use Misa\Accounting\Application\Input\Provider\CollectionPhoneInput;
use Misa\Accounting\Application\Input\Provider\PhoneInput;
use Misa\Accounting\Application\Services\Provider\Information\PhoneService as ProviderPhoneService;
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
 * @Route("/providers/{providerId}/phone")
 */
class ProviderPhoneController extends Controller
{
    /** @var ProviderPhoneService */
    private $providerPhoneService;

    /**
     * ProviderPhoneController constructor.
     * @param ProviderPhoneService $providerPhoneService
     */
    public function __construct(ProviderPhoneService $providerPhoneService)
    {
        $this->providerPhoneService = $providerPhoneService;
    }


    /**
     * @Route("", name="accounting_providers_phone_create")
     * @Method({"POST"})
     * @param $providerId
     * @param Request $request
     * @param LoggerInterface $logger
     * @return JsonResponse
     */
    public function createProviderPhoneAction($providerId, Request $request, LoggerInterface $logger)
    {
        $logger->info('create Company');

        $number = $request->get('number');
        $type = $request->get('type');

        $this->validateEmptyValue($number, 'numero de telefono');
        $this->validateEmptyValue($type, 'tipo de telefono');

        $ids = $this->providerPhoneService->create($providerId, new CollectionPhoneInput([
                ['number' => $number,'type' => $type,]
            ]));

        return new JsonResponse(['id' => array_shift($ids)]);
    }

    /**
     * @Route("/{phoneId}", name="accounting_providers_phone_update")
     * @Method({"PUT"})
     * @param $providerId
     * @param $phoneId
     * @param Request $request
     * @param LoggerInterface $logger
     * @return JsonResponse
     */
    public function updateProviderPhoneAction($providerId, $phoneId, Request $request, LoggerInterface $logger)
    {
        $logger->info('create Company');

        $number = $request->get('number');
        $type = $request->get('type');

        $this->validateNotEmptyOnceValue([$number,$type]);

        $this->providerPhoneService->update($providerId, $phoneId, new PhoneInput($number, $type));

        return new JsonResponse(['ok']);
    }


    /**
     * @Route("/{phoneId}", name="accounting_providers_phone_delete")
     * @Method({"DELETE"})
     * @param $providerId
     * @param $phoneId
     * @param Request $request
     * @param LoggerInterface $logger
     * @return JsonResponse
     */
    public function deleteProviderPhoneAction($providerId, $phoneId, Request $request, LoggerInterface $logger)
    {
        $logger->info('create Company');

        $this->providerPhoneService->delete($providerId, $phoneId);

        return new JsonResponse(['ok']);
    }
}
