<?php

/**
 * This file is auto-generated by Saloon SDK Generator
 * Generator: Crescat\SaloonSdkGenerator\Generators\DtoGenerator
 * Do not modify it directly.
 */

declare(strict_types=1);

namespace SellingPartnerApi\Seller\OrdersV0\Dto;

use SellingPartnerApi\Dto;

final class PrescriptionDetail extends Dto
{
    /**
     * @param  string  $prescriptionId  The identifier for the prescription used to verify the regulated product.
     * @param  \DateTimeInterface  $expirationDate  The expiration date of the prescription used to verify the regulated product, in [ISO 8601](https://developer-docs.amazon.com/sp-api/docs/iso-8601) date time format.
     * @param  int  $writtenQuantity  The number of units in each fill as provided in the prescription.
     * @param  int  $totalRefillsAuthorized  The total number of refills written in the original prescription used to verify the regulated product. If a prescription originally had no refills, this value must be 0.
     * @param  int  $refillsRemaining  The number of refills remaining for the prescription used to verify the regulated product. If a prescription originally had 10 total refills, this value must be `10` for the first order, `9` for the second order, and `0` for the eleventh order. If a prescription originally had no refills, this value must be 0.
     * @param  string  $clinicId  The identifier for the clinic which provided the prescription used to verify the regulated product.
     * @param  string  $usageInstructions  The instructions for the prescription as provided by the approver of the regulated product.
     */
    public function __construct(
        public readonly string $prescriptionId,
        public readonly \DateTimeInterface $expirationDate,
        public readonly int $writtenQuantity,
        public readonly int $totalRefillsAuthorized,
        public readonly int $refillsRemaining,
        public readonly string $clinicId,
        public readonly string $usageInstructions,
    ) {}
}
