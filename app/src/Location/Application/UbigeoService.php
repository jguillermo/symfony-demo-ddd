<?php

namespace Misa\Location\Application;

use Misa\Location\Domain\Ubigeo\SearchRepository as UbigeoSearchRepository;
use MisaSdk\Common\Exception\BadRequest;

/**
 * UbigeoService Class
 *
 * @package Misa\Location\Application
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class UbigeoService
{

    /** @var UbigeoSearchRepository */
    private $ubigeoSearchRepository;

    /**
     * UbigeoService constructor.
     * @param UbigeoSearchRepository $ubigeoSearchRepository
     */
    public function __construct(UbigeoSearchRepository $ubigeoSearchRepository)
    {
        $this->ubigeoSearchRepository = $ubigeoSearchRepository;
    }


    /**
     * @param $q
     * @return array
     * @throws BadRequest
     */
    public function search($q)
    {
        if (empty($q)) {
            return [];
        }
        if (! is_scalar($q)) {
            throw new BadRequest("El parámetro a buscar debe ser alfa numérico");
        }
        return $this->ubigeoSearchRepository->find(trim($q));
    }
}