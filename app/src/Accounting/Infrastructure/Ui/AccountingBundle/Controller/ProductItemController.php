<?php

namespace Misa\Accounting\Infrastructure\Ui\AccountingBundle\Controller;

use Misa\Accounting\Application\Input\Product\ItemInput;
use Misa\Accounting\Application\Services\Product\Item\MngService as ItemMngService;
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
 * @Route("/product-items")
 */
class ProductItemController extends Controller
{
    /** @var ItemMngService */
    private $itemMngService;


    public function __construct(ItemMngService $itemMngService)
    {
        $this->itemMngService = $itemMngService;
    }


    /**
     * @Route("", name="accounting_providers_product_item_create")
     * @Method({"POST"})
     * @param Request $request
     * @param LoggerInterface $logger
     * @return JsonResponse
     */
    public function createProductItemAction(Request $request, LoggerInterface $logger)
    {
        $logger->info('create Item');

        $id = $this->itemMngService->create(new ItemInput(
            $request->get('description'),
            $request->get('code')
        ));

        return new JsonResponse(['id' => $id]);
    }

    /**
     * @Route("/{itemId}", name="accounting_providers_product_item_update")
     * @Method({"PUT"})
     * @param $itemId
     * @param Request $request
     * @param LoggerInterface $logger
     * @return JsonResponse
     */
    public function updateProductItemAction($itemId, Request $request, LoggerInterface $logger)
    {
        $logger->info('update Item');

        $this->itemMngService->update(new ItemInput(
            $request->get('description'),
            $request->get('code'),
            false
        ), $itemId);

        return new JsonResponse(['ok']);
    }


    /**
     * @Route("/{itemId}", name="accounting_providers_product_item_delete")
     * @Method({"DELETE"})
     * @param $itemId
     * @param LoggerInterface $logger
     * @return JsonResponse
     */
    public function deleteProductItemAction($itemId, LoggerInterface $logger)
    {
        $logger->info('delete Item');

        $this->itemMngService->remove($itemId);

        return new JsonResponse(['ok']);
    }
}
