<?php

namespace MisaSdk\Common\EventListener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

/**
 * MisaExceptionListener Class
 *
 * @package MisaSdk\Common\EventListener
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class MisaExceptionListener
{
    /**
     * @param GetResponseForExceptionEvent $event
     */
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();
        $responseData = [
            'message' => $exception->getMessage()
        ];
        $event->setResponse(new JsonResponse($responseData));
    }
}
