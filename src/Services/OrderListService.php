<?php

namespace ItezPayments\Services;

use ItezPayments\ApiProvider;
use ItezPayments\Exception\ApiClientException;
use ItezPayments\Exception\ApiException;
use ItezPayments\Exception\ApiServerException;
use ItezPayments\Resources\OrderList\OrderListRequest;
use ItezPayments\Resources\OrderList\OrderListResponse;

class OrderListService
{
    const ORDER_LIST_ENDPOINT = '/order/list';

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
    public function send(OrderListRequest $orderListRequest): OrderListResponse
    {
        $result = $this->provider->send(
            'POST',
            self::ORDER_LIST_ENDPOINT,
            $orderListRequest->toArray()
        );

        return $this->createOrderListResponseDTO($result);
    }

    private function createOrderListResponseDTO(array $responseArray): OrderListResponse
    {
        $saleResponseDTO = new OrderListResponse();
        $saleResponseDTO->fromArray($responseArray);

        return $saleResponseDTO;
    }

}
