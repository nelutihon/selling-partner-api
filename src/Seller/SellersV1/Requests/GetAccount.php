<?php

/**
 * This file is auto-generated by Saloon SDK Generator
 * Generator: SellingPartnerApi\Generator\Generators\RequestGenerator
 * Do not modify it directly.
 */

declare(strict_types=1);

namespace SellingPartnerApi\Seller\SellersV1\Requests;

use Exception;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use SellingPartnerApi\Request;
use SellingPartnerApi\Seller\SellersV1\Responses\GetAccountResponse;

/**
 * getAccount
 */
class GetAccount extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/sellers/v1/account';
    }

    public function createDtoFromResponse(Response $response): GetAccountResponse
    {
        $status = $response->status();
        $responseCls = match ($status) {
            200, 400, 403, 404, 413, 415, 429, 500, 503 => GetAccountResponse::class,
            default => throw new Exception("Unhandled response status: {$status}")
        };

        return $responseCls::deserialize($response->json());
    }
}