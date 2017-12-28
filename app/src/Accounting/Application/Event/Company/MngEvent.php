<?php

namespace Misa\Accounting\Application\Event\Company;

use Misa\Accounting\Domain\Provider\Provider;
use Misa\Accounting\Domain\Provider\Source\SearchRepository as CompanySearchRepository;
use Misa\Accounting\Domain\Provider\Source\Source;
use MisaSdk\Common\Exception\AppException;
use MisaSdk\Common\Exception\SrvErrorException;

/**
 * MngEvent Class
 *
 * @package Misa\Accounting\Application\Event\Company
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class MngEvent
{
    /** @var CompanySearchRepository */
    private $companySearchRepository;

    public function __construct(CompanySearchRepository $companySearchRepository)
    {
        $this->companySearchRepository = $companySearchRepository;
    }

    public function persist(Source $source)
    {
        try {
            $this->companySearchRepository->index($source);
        } catch (AppException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw new SrvErrorException("No se pudo indexar la data");
        }
    }
}
