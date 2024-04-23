<?php

namespace ItezPayments\Services;

use ItezPayments\ApiProvider;
use ItezPayments\Exception\ApiClientException;
use ItezPayments\Exception\ApiException;
use ItezPayments\Exception\ApiServerException;
use ItezPayments\Resources\Balance\BalanceRequest;
use ItezPayments\Resources\Balance\BalanceResponse;

class BalanceService
{
    const BALANCE_ENDPOINT = '/balance';

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
    public function send(BalanceRequest $balanceRequest): BalanceResponse
    {
        $result = $this->provider->send('POST', self::BALANCE_ENDPOINT, $balanceRequest->toArray());

        return $this->createBalanceResponseDTO($result);
    }

    private function createBalanceResponseDTO(array $responseArray): BalanceResponse
    {
        $saleResponseDTO = new BalanceResponse();
        $saleResponseDTO->fromArray($responseArray);

        return $saleResponseDTO;
    }
}
