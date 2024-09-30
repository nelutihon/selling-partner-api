<?php

/**
 * This file is auto-generated by Saloon SDK Generator
 * Generator: Crescat\SaloonSdkGenerator\Generators\DtoGenerator
 * Do not modify it directly.
 */

declare(strict_types=1);

namespace SellingPartnerApi\Seller\ProductPricingV20220501\Dto;

use SellingPartnerApi\Dto;

final class FeaturedOfferExpectedPriceResponseBody extends Dto
{
    protected static array $complexArrayTypes = [
        'featuredOfferExpectedPriceResults' => FeaturedOfferExpectedPriceResult::class,
    ];

    /**
     * @param  ?OfferIdentifier  $offerIdentifier  Identifies an offer from a particular seller on an ASIN.
     * @param  FeaturedOfferExpectedPriceResult[]|null  $featuredOfferExpectedPriceResults  A list of featured offer expected price results for the requested offer.
     * @param  ?ErrorList  $errors  A list of error responses returned when a request is unsuccessful.
     */
    public function __construct(
        public readonly ?OfferIdentifier $offerIdentifier = null,
        public readonly ?array $featuredOfferExpectedPriceResults = null,
        public readonly ?ErrorList $errors = null,
    ) {}
}
