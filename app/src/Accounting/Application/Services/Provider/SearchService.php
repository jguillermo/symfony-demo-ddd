<?php

namespace Misa\Accounting\Application\Services\Provider;

use Misa\Accounting\Domain\Provider\ProviderSearchRepository;
use MisaSdk\Common\Exception\BadRequest;

/**
 * SearchService Class
 *
 * @package Misa\Accounting\Application\Services\Provider
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class SearchService
{
    /** @var ProviderSearchRepository */
    private $providerSearchRepository;

    /**
     * SearchService constructor.
     * @param ProviderSearchRepository $providerSearchRepository
     */
    public function __construct(ProviderSearchRepository $providerSearchRepository)
    {
        $this->providerSearchRepository = $providerSearchRepository;
    }

    public function freeSearch($q)
    {
        if (empty($q)) {
            return [];
        }
        if (! is_scalar($q)) {
            throw new BadRequest("El parámetro a buscar debe ser alfa numérico");
        }
        return $this->providerSearchRepository->find(trim($q));
    }
}
