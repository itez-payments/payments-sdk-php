<?php

namespace ItezPayments\Services;

use ItezPayments\ApiProvider;
use ItezPayments\Exception\ApiClientException;
use ItezPayments\Exception\ApiException;
use ItezPayments\Exception\ApiServerException;
use ItezPayments\Resources\Payout\PayoutCreatedResponse;
use ItezPayments\Resources\Payout\PayoutRequest;

class PayoutService
{
    const PAYOUT_ENDPOINT = '/order/payout';

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
    public function send(PayoutRequest $payoutRequest): PayoutCreatedResponse
    {
        $result = $this->provider->send(
            'POST',
            self::PAYOUT_ENDPOINT,
            $payoutRequest->toArray()
        );

        return $this->createPayoutResponseDTO($result);
    }

    private function createPayoutResponseDTO(array $responseArray): PayoutCreatedResponse
    {
        $saleResponseDTO = new PayoutCreatedResponse();
        $saleResponseDTO->fromArray($responseArray);

        return $saleResponseDTO;
    }

}
