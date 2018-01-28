<?php

namespace Misa\Accounting\Infrastructure\Ui\AccountingBundle\Controller;

use Misa\Accounting\Application\Input\Product\ProductInput;
use Misa\Accounting\Application\Services\Product\ListService as ProductListService;
use Misa\Accounting\Application\Services\Product\MngService as ProductMngService;
use Misa\Accounting\Application\Services\Product\SearchService as ProductSearchService;
use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use MisaSdk\Common\Controller\Controller;

/**
 * ProductItemController Class
 *
 * @package Misa\Accounting\Infrastructure\Ui\AccountingBundle\Controller
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 * @Route("/product")
 */
class ProductController extends Controller
{
    /** @var ProductMngService */
    private $productMngService;

    /** @var  ProductSearchService */
    private $productSearchService;

    /** @var ProductListService */
    private $productListService;

    /**
     * ProductController constructor.
     * @param ProductMngService $productMngService
     * @param ProductSearchService $productSearchService
     * @param ProductListService $productListService
     */
    public function __construct(
        ProductMngService $productMngService,
        ProductSearchService $productSearchService,
        ProductListService $productListService
    ) {
        $this->productMngService = $productMngService;
        $this->productSearchService = $productSearchService;
        $this->productListService = $productListService;
    }


    /**
     * @Route("", name="accounting_product_create")
     * @Method({"POST"})
     * @param Request $request
     * @param LoggerInterface $logger
     * @return JsonResponse
     * @throws \MisaSdk\Common\Exception\BadRequest
     */
    public function createProductAction(Request $request, LoggerInterface $logger)
    {
        $logger->info('create Product');

        $id = $this->productMngService->create(new ProductInput(
            $request->get('name'),
            $request->get('item_id')
        ));

        return new JsonResponse(['id' => $id]);
    }

    /**
     * @Route("/{productId}", name="accounting_product_update")
     * @Method({"PUT"})
     * @param $productId
     * @param Request $request
     * @param LoggerInterface $logger
     * @return JsonResponse
     * @throws \MisaSdk\Common\Exception\BadRequest
     */
    public function updateProductAction($productId, Request $request, LoggerInterface $logger)
    {
        $logger->info('update Product');

        $this->productMngService->update(new ProductInput(
            $request->get('name'),
            $request->get('item_id'),
            false
        ), $productId);

        return new JsonResponse(['ok']);
    }

    /**
     * @Route("/{productId}", name="accounting_product_delete")
     * @Method({"DELETE"})
     * @param $productId
     * @param LoggerInterface $logger
     * @return JsonResponse
     * @throws \MisaSdk\Common\Exception\BadRequest
     */
    public function deleteProductAction($productId, LoggerInterface $logger)
    {
        $logger->info('delete Product');

        $this->productMngService->remove($productId);

        return new JsonResponse(['ok']);
    }

    /**
     * @Route("", name="accounting_product_search")
     * @Method({"GET"})
     * @param Request $request
     * @return JsonResponse
     * @throws \MisaSdk\Common\Exception\BadRequest
     */
    public function searchProvidersAction(Request $request)
    {
        $q = $request->query->get('q', '');
        return new JsonResponse($this->productSearchService->freeSearch($q));
    }

    /**
     * @Route("/{productId}", name="accounting_product_get_id")
     * @Method({"GET"})
     * @param $productId
     * @param LoggerInterface $logger
     * @return JsonResponse
     * @throws \MisaSdk\Common\Exception\BadRequest
     */
    public function getByIdProductAction($productId, LoggerInterface $logger)
    {
        $logger->info('getById Product');

        $this->productListService->getById($productId);

        return new JsonResponse($this->productListService->getById($productId));
    }
}
