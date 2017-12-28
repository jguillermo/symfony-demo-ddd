<?php

namespace Misa\Accounting\Application\Services\Source;

use Misa\Accounting\Domain\Provider\Source\SearchRepository as CompanySearchRepository;
use MisaSdk\Common\Exception\BadRequest;

/**
 * SearchService Class
 *
 * @package Misa\Accounting\Application\Services\Source
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class SearchService
{
    /** @var CompanySearchRepository */
    private $companySearchRepository;

    public function __construct(CompanySearchRepository $companySearchRepository)
    {
        $this->companySearchRepository = $companySearchRepository;
    }

    /**
     * @param $q
     * @return array
     * @throws BadRequest
     */
    public function freeSearch($q)
    {
        if (empty($q)) {
            return [];
        }
        if (! is_scalar($q)) {
            throw new BadRequest("El parámetro a buscar debe ser alfa numérico");
        }
        return $this->companySearchRepository->find(trim($q));
    }
}
