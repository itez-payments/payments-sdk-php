<?php

namespace ItezPayments\Services;

use ItezPayments\ApiProvider;
use ItezPayments\Exception\ApiClientException;
use ItezPayments\Exception\ApiException;
use ItezPayments\Exception\ApiServerException;
use ItezPayments\Resources\OrderStatus\PayoutStatusResponse;
use ItezPayments\Resources\OrderStatus\SaleStatusResponse;

class OrderStatusService
{
    const ORDER_STATUS_ENDPOINT = '/order/status';

    const ORDER_TYPE_FIELD = 'type';
    const ORDER_TYPE_SALE = 'sale';
    const ORDER_TYPE_PAYOUT = 'payout';

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
    public function send(string $orderId)
    {
        $url = self::ORDER_STATUS_ENDPOINT . '/' . $orderId;
        $result = $this->provider->send('GET', $url);

        return $this->createOrderStatusResponseDTO($result);
    }

    private function createOrderStatusResponseDTO(array $responseArray)
    {
        $orderType = $responseArray[self::ORDER_TYPE_FIELD];

        $orderStatusDTO = null;

        if ($orderType === self::ORDER_TYPE_SALE) {
            $orderStatusDTO = new SaleStatusResponse();
            $orderStatusDTO->fromArray($responseArray);
        }

        if ($orderType === self::ORDER_TYPE_PAYOUT) {
            $orderStatusDTO = new PayoutStatusResponse();
            $orderStatusDTO->fromArray($responseArray);
        }


        return $orderStatusDTO;
    }

}
