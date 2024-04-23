<?php

namespace ItezPayments;

use ItezPayments\Exception\ApiClientException;
use ItezPayments\Exception\ApiException;
use ItezPayments\Exception\ApiServerException;
use ItezPayments\Resources\Balance\BalanceRequest;
use ItezPayments\Resources\OrderList\OrderListRequest;
use ItezPayments\Resources\Payout\PayoutRequest;
use ItezPayments\Resources\Sale\SaleRequest;
use ItezPayments\Services\BalanceService;
use ItezPayments\Services\OrderListService;
use ItezPayments\Services\OrderStatusService;
use ItezPayments\Services\PayoutService;
use ItezPayments\Services\SaleService;

class ApiService
{
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
    public function sale(SaleRequest $saleRequest): Resources\Sale\SaleCreatedResponse
    {
        return (new SaleService($this->provider))->send($saleRequest);
    }

    /**
     * @throws ApiServerException
     * @throws ApiException
     * @throws ApiClientException
     */
    public function payout(PayoutRequest $payoutRequest): Resources\Payout\PayoutCreatedResponse
    {
        return (new PayoutService($this->provider))->send($payoutRequest);
    }

    /**
     * @throws ApiServerException
     * @throws ApiException
     * @throws ApiClientException
     */
    public function getOrderStatus(string $orderId)
    {
        return (new OrderStatusService($this->provider))->send($orderId);
    }

    /**
     * @throws ApiServerException
     * @throws ApiException
     * @throws ApiClientException
     */
    public function getOrderList(OrderListRequest $orderListRequest): Resources\OrderList\OrderListResponse
    {
        return (new OrderListService($this->provider))->send($orderListRequest);
    }

    /**
     * @throws ApiServerException
     * @throws ApiException
     * @throws ApiClientException
     */
    public function getBalances(BalanceRequest $balanceRequest): Resources\Balance\BalanceResponse
    {
        return (new BalanceService($this->provider))->send($balanceRequest);
    }

}
