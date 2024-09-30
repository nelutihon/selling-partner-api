<?php

/**
 * This file is auto-generated by Saloon SDK Generator
 * Generator: Crescat\SaloonSdkGenerator\Generators\DtoGenerator
 * Do not modify it directly.
 */

declare(strict_types=1);

namespace SellingPartnerApi\Seller\OrdersV0\Dto;

use SellingPartnerApi\Dto;

final class Measurement extends Dto
{
    protected static array $attributeMap = ['unit' => 'Unit', 'value' => 'Value'];

    /**
     * @param  string  $unit  The unit of measure.
     * @param  float  $value  The measurement value.
     */
    public function __construct(
        public readonly string $unit,
        public readonly float $value,
    ) {}
}
