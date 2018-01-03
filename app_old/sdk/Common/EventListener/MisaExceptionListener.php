<?php

namespace MisaSdk\Common\EventListener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

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
//        $exception = $event->getException();
//        $responseData = [
//            'message' => $exception->getMessage()
//        ];
//        $event->setResponse(new JsonResponse($responseData));

        // You get the exception object from the received event
        $exception = $event->getException();
        $message = sprintf(
            '%s with code: %s',
            $exception->getMessage(),
            $exception->getCode()
        );

        $responseData = [
            'message' => $message
        ];

        // Send the modified response object to the event
        $event->setResponse(new JsonResponse($responseData));
    }
}
