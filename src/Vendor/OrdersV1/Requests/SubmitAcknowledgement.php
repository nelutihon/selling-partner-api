<?php

/**
 * This file is auto-generated by Saloon SDK Generator
 * Generator: SellingPartnerApi\Generator\Generators\RequestGenerator
 * Do not modify it directly.
 */

declare(strict_types=1);

namespace SellingPartnerApi\Vendor\OrdersV1\Requests;

use Exception;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use SellingPartnerApi\Request;
use SellingPartnerApi\Vendor\OrdersV1\Dto\SubmitAcknowledgementRequest;
use SellingPartnerApi\Vendor\OrdersV1\Responses\SubmitAcknowledgementResponse;

/**
 * submitAcknowledgement
 */
class SubmitAcknowledgement extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param  SubmitAcknowledgementRequest  $submitAcknowledgementRequest  The request schema for the submitAcknowledgment operation.
     */
    public function __construct(
        public SubmitAcknowledgementRequest $submitAcknowledgementRequest,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/vendor/orders/v1/acknowledgements';
    }

    public function createDtoFromResponse(Response $response): SubmitAcknowledgementResponse
    {
        $status = $response->status();
        $responseCls = match ($status) {
            202, 400, 403, 404, 413, 415, 429, 500, 503 => SubmitAcknowledgementResponse::class,
            default => throw new Exception("Unhandled response status: {$status}")
        };

        return $responseCls::deserialize($response->json());
    }

    public function defaultBody(): array
    {
        return $this->submitAcknowledgementRequest->toArray();
    }
}
