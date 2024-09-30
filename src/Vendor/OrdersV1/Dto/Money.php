<?php

/**
 * This file is auto-generated by Saloon SDK Generator
 * Generator: Crescat\SaloonSdkGenerator\Generators\DtoGenerator
 * Do not modify it directly.
 */

declare(strict_types=1);

namespace SellingPartnerApi\Vendor\OrdersV1\Dto;

use SellingPartnerApi\Dto;

final class Money extends Dto
{
    /**
     * @param  ?string  $currencyCode  Three digit currency code in ISO 4217 format. String of length 3.
     * @param  ?string  $amount  A decimal number with no loss of precision. Useful when precision loss is unacceptable, as with currencies. Follows RFC7159 for number representation. <br>**Pattern** : `^-?(0|([1-9]\d*))(\.\d+)?([eE][+-]?\d+)?$`.
     * @param  ?string  $unitOfMeasure  The unit of measure for prices of items sold by weight. If this field is absent, the item is sold by eaches.
     */
    public function __construct(
        public readonly ?string $currencyCode = null,
        public readonly ?string $amount = null,
        public readonly ?string $unitOfMeasure = null,
    ) {}
}
