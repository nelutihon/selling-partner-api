<?php

/**
 * This file is auto-generated by Saloon SDK Generator
 * Generator: Crescat\SaloonSdkGenerator\Generators\DtoGenerator
 * Do not modify it directly.
 */

declare(strict_types=1);

namespace SellingPartnerApi\Seller\SellersV1\Dto;

use SellingPartnerApi\Dto;

final class Account extends Dto
{
    protected static array $complexArrayTypes = ['marketplaceLevelAttributes' => MarketplaceLevelAttributes::class];

    /**
     * @param  MarketplaceLevelAttributes[]  $marketplaceLevelAttributes  A list of details of the marketplaces where the seller account is active.
     * @param  string  $businessType  The type of business registered for the seller account.
     * @param  ?Business  $business  Information about the seller's business. Certain fields may be omitted depending on the seller's `businessType`.
     * @param  ?PrimaryContact  $primaryContact  Information about the seller's primary contact.
     */
    public function __construct(
        public readonly array $marketplaceLevelAttributes,
        public readonly string $businessType,
        public readonly ?Business $business = null,
        public readonly ?PrimaryContact $primaryContact = null,
    ) {}
}
