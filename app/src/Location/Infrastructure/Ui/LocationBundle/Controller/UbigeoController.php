<?php

namespace Misa\Location\Infrastructure\Ui\LocationBundle\Controller;
use Misa\Location\Application\UbigeoService;
use MisaSdk\Common\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
/**
 * UbigeoController Class
 *
 * @package Misa\Location\Infrastructure\Ui\LocationBundle\Controller
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class UbigeoController extends Controller
{
    /** @var UbigeoService */
    private $ubigeoService;

    /**
     * UbigeoController constructor.
     * @param UbigeoService $ubigeoService
     */
    public function __construct(UbigeoService $ubigeoService)
    {
        $this->ubigeoService = $ubigeoService;
    }

    public function searchUbigeoAction(Request $request)
    {
        $q = $request->query->get('q', '');
        return new JsonResponse($this->ubigeoService->search($q));
    }
}