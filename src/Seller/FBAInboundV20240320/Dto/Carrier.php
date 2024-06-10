<?php

/**
 * This file is auto-generated by Saloon SDK Generator
 * Generator: Crescat\SaloonSdkGenerator\Generators\DtoGenerator
 * Do not modify it directly.
 */

declare(strict_types=1);

namespace SellingPartnerApi\Seller\FBAInboundV20240320\Dto;

use SellingPartnerApi\Dto;

final class Carrier extends Dto
{
    /**
     * @param  ?string  $alphaCode  The carrier code. For example, USPS or DHLEX.
     * @param  ?string  $name  The name of the carrier.
     */
    public function __construct(
        public readonly ?string $alphaCode = null,
        public readonly ?string $name = null,
    ) {
    }
}