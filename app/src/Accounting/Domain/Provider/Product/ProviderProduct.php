<?php

namespace Misa\Accounting\Domain\Provider\Product;

use Misa\Accounting\Domain\Product\Product;
use Misa\Accounting\Domain\Provider\Provider;
use MisaSdk\Common\Entity\AbstractEntity;
use MisaSdk\Common\Entity\MisaToArray;

/**
 * ProviderProduct Class
 *
 * @package Misa\Accounting\Domain\Provider\Product
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class ProviderProduct extends AbstractEntity implements MisaToArray
{
    const MIN_LEVEL = 0;

    /** @var string */
    private $id;

    /** @var Provider */
    private $provider;

    /** @var Product */
    private $product;

    /** @var int */
    private $level;


    public static function create(Provider $provider, Product $product, $id = self::EMPTY_ID)
    {
        $providerProduct = new self();
        $providerProduct->id = self::uuid($id)->getId();
        $providerProduct->provider = $provider;
        $providerProduct->product = $product;
        $providerProduct->level = self::MIN_LEVEL;
        return $providerProduct;
    }

    /**
     * @return Product
     */
    public function product()
    {
        return $this->product;
    }


    public function toArray()
    {
        return $this->product->toArray();
    }
}
