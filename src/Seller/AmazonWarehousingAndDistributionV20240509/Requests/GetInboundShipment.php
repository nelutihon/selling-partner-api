<?php

/**
 * This file is auto-generated by Saloon SDK Generator
 * Generator: SellingPartnerApi\Generator\Generators\RequestGenerator
 * Do not modify it directly.
 */

declare(strict_types=1);

namespace SellingPartnerApi\Seller\AmazonWarehousingAndDistributionV20240509\Requests;

use Exception;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use SellingPartnerApi\Request;
use SellingPartnerApi\Seller\AmazonWarehousingAndDistributionV20240509\Responses\ErrorList;
use SellingPartnerApi\Seller\AmazonWarehousingAndDistributionV20240509\Responses\InboundShipment;

/**
 * getInboundShipment
 */
class GetInboundShipment extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param  string  $shipmentId  ID for the shipment. A shipment contains the cases being inbounded.
     * @param  ?string  $skuQuantities  If equal to `SHOW`, the response includes the shipment SKU quantity details.
     *
     * Defaults to `HIDE`, in which case the response does not contain SKU quantities
     */
    public function __construct(
        protected string $shipmentId,
        protected ?string $skuQuantities = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/awd/2024-05-09/inboundShipments/{$this->shipmentId}";
    }

    public function createDtoFromResponse(Response $response): InboundShipment|ErrorList
    {
        $status = $response->status();
        $responseCls = match ($status) {
            200 => InboundShipment::class,
            400, 403, 404, 413, 415, 429, 500, 503 => ErrorList::class,
            default => throw new Exception("Unhandled response status: {$status}")
        };

        return $responseCls::deserialize($response->json());
    }

    public function defaultQuery(): array
    {
        return array_filter(['skuQuantities' => $this->skuQuantities]);
    }
}
