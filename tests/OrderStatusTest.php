<?php

namespace ItezPayments\Tests;

use ItezPayments\ApiProvider;
use ItezPayments\Exception\ApiClientException;
use ItezPayments\Exception\ApiException;
use ItezPayments\Exception\ApiServerException;
use ItezPayments\Resources\OrderStatus\SaleStatusResponse;
use ItezPayments\Services\OrderStatusService;
use PHPUnit\Framework\TestCase;

class OrderStatusTest extends TestCase
{
    /**
     * @var array
     */
    private $orderStatusResponse;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->orderStatusResponse = require __DIR__ . '/data/orderStatusResponse.php';
    }

    /**
     * @throws ApiException
     * @throws ApiServerException
     * @throws ApiClientException
     */
    public function testSend()
    {
        $orderId = 'a548fd81-c861-42ba-85be-9f24256bb509';

        $providerMock = $this->createMock(ApiProvider::class);

        $providerMock->expects($this->once())
            ->method('send')
            ->with('GET', '/order/status/' . $orderId)
            ->willReturn($this->orderStatusResponse);


        $orderStatus = new OrderStatusService($providerMock);
        $result = $orderStatus->send($orderId);

        $response = new SaleStatusResponse();
        $this->assertEquals($response->fromArray($this->orderStatusResponse), $result);
    }
}
