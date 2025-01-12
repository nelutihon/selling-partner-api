<?php

/**
 * This file is auto-generated by Saloon SDK Generator
 * Generator: Crescat\SaloonSdkGenerator\Generators\DtoGenerator
 * Do not modify it directly.
 */

declare(strict_types=1);

namespace SellingPartnerApi\Seller\FBAOutboundV20200701\Dto;

use SellingPartnerApi\Dto;

final class DeliveryOffer extends Dto
{
    /**
     * @param  ?\DateTimeInterface  $expiresAt  Date timestamp
     * @param  ?DateRange  $dateRange  The time range within which something (for example, a delivery) will occur.
     * @param  ?DeliveryPolicy  $policy  The policy for a delivery offering.
     */
    public function __construct(
        public ?\DateTimeInterface $expiresAt = null,
        public ?DateRange $dateRange = null,
        public ?DeliveryPolicy $policy = null,
    ) {}
}
