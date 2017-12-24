<?php

namespace Misa\Accounting\Infrastructure\Ui\AccountingBundle\Controller;

use Misa\Accounting\Application\Input\Provider\CollectionEmailInput;
use Misa\Accounting\Application\Input\Provider\EmailInput;
use Misa\Accounting\Application\Services\Provider\Information\EmailService as ProviderEmailService;
use MisaSdk\Common\Controller\Controller;
use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * ProviderInformationEmailController Class
 *
 * @package Misa\Accounting\Infrastructure\Ui\AccountingBundle\Controller
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 * @Route("/providers/{providerId}/email")
 */
class ProviderEmailController extends Controller
{
    /** @var ProviderEmailService */
    private $providerEmailService;

    /**
     * ProviderEmailController constructor.
     * @param ProviderEmailService $providerEmailService
     */
    public function __construct(ProviderEmailService $providerEmailService)
    {
        $this->providerEmailService = $providerEmailService;
    }


    /**
     * @Route("", name="accounting_providers_email_create")
     * @Method({"POST"})
     * @param $providerId
     * @param Request $request
     * @param LoggerInterface $logger
     * @return JsonResponse
     */
    public function createProviderEmailAction($providerId, Request $request, LoggerInterface $logger)
    {
        $logger->info('create Company');

        $email = $request->get('email');

        $this->validateEmptyValue($email, 'EMAIL');

        $ids = $this->providerEmailService->create($providerId, new CollectionEmailInput([
                ['email' => $email]
            ]));

        return new JsonResponse(['id' => array_shift($ids)]);
    }

    /**
     * @Route("/{emailId}", name="accounting_providers_email_update")
     * @Method({"PUT"})
     * @param $providerId
     * @param $emailId
     * @param Request $request
     * @param LoggerInterface $logger
     * @return JsonResponse
     */
    public function updateProviderEmailAction($providerId, $emailId, Request $request, LoggerInterface $logger)
    {
        $logger->info('create Company');

        $email = $request->get('email');

        $this->validateEmptyValue($email, 'EMAIL');

        $this->providerEmailService->update($providerId, $emailId, new EmailInput($email));

        return new JsonResponse(['ok']);
    }


    /**
     * @Route("/{emailId}", name="accounting_providers_email_delete")
     * @Method({"DELETE"})
     * @param $providerId
     * @param $emailId
     * @param Request $request
     * @param LoggerInterface $logger
     * @return JsonResponse
     */
    public function deleteProviderEmailAction($providerId, $emailId, Request $request, LoggerInterface $logger)
    {
        $logger->info('create Company');

        $this->providerEmailService->delete($providerId, $emailId);

        return new JsonResponse(['ok']);
    }
}
