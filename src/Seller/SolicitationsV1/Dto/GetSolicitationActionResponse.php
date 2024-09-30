<?php

/**
 * This file is auto-generated by Saloon SDK Generator
 * Generator: Crescat\SaloonSdkGenerator\Generators\DtoGenerator
 * Do not modify it directly.
 */

declare(strict_types=1);

namespace SellingPartnerApi\Seller\SolicitationsV1\Dto;

use SellingPartnerApi\Dto;

final class GetSolicitationActionResponse extends Dto
{
    protected static array $attributeMap = ['links' => '_links', 'embedded' => '_embedded'];

    /**
     * @param  ?SolicitationsAction  $payload  A simple object containing the name of the template.
     * @param  ?ErrorList  $errors  A list of error responses returned when a request is unsuccessful.
     */
    public function __construct(
        public readonly ?Links2 $links = null,
        public readonly ?Embedded2 $embedded = null,
        public readonly ?SolicitationsAction $payload = null,
        public readonly ?ErrorList $errors = null,
    ) {}
}
