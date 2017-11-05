<?php

namespace Misa\Accounting\Application\Event\Provider;

use Misa\Accounting\Domain\Provider\Provider;
use Misa\Accounting\Domain\Provider\ProviderSearchRepository;
use MisaSdk\Common\Exception\AppException;
use MisaSdk\Common\Exception\SrvErrorException;

/**
 * MngEvent Class
 *
 * @package Misa\Accounting\Application\Event\Provider
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class MngEvent
{
    /** @var ProviderSearchRepository */
    private $providerSearchRepository;

    /**
     * MngEvent constructor.
     * @param ProviderSearchRepository $providerSearchRepository
     */
    public function __construct(ProviderSearchRepository $providerSearchRepository)
    {
        $this->providerSearchRepository = $providerSearchRepository;
    }

    public function create(Provider $provider)
    {
        try {
            $this->providerSearchRepository->index($provider);
        } catch (AppException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw new SrvErrorException("No se pudo indexar la data");
        }
    }
}
