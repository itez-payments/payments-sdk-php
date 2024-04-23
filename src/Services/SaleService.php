<?php

namespace ItezPayments\Services;

use ItezPayments\ApiProvider;
use ItezPayments\Exception\ApiClientException;
use ItezPayments\Exception\ApiException;
use ItezPayments\Exception\ApiServerException;
use ItezPayments\Resources\Sale\SaleCreatedResponse;
use ItezPayments\Resources\Sale\SaleRequest;

class SaleService
{
    const SALE_ENDPOINT = '/order/sale';

    private $provider;


    public function __construct(ApiProvider $provider)
    {
        $this->provider = $provider;
    }

    /**
     * @throws ApiServerException
     * @throws ApiException
     * @throws ApiClientException
     */
    public function send(SaleRequest $saleRequest): SaleCreatedResponse
    {
        $result = $this->provider->send('POST', self::SALE_ENDPOINT, $saleRequest->toArray());

        return $this->createSaleResponseDTO($result);
    }

    private function createSaleResponseDTO(array $responseArray): SaleCreatedResponse
    {
        $saleResponseDTO = new SaleCreatedResponse();
        $saleResponseDTO->fromArray($responseArray);

        return $saleResponseDTO;
    }
}
