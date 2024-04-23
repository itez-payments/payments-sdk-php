<?php

namespace ItezPayments\Tests;

use ItezPayments\ApiProvider;
use ItezPayments\Exception\ApiClientException;
use ItezPayments\Exception\ApiException;
use ItezPayments\Exception\ApiServerException;
use ItezPayments\Resources\OrderList\OrderListRequest;
use ItezPayments\Resources\OrderList\OrderListResponse;
use ItezPayments\Services\OrderListService;
use PHPUnit\Framework\TestCase;

class OrderListTest extends TestCase
{
    /**
     * @var array
     */
    private $orderListResponse;

    /**
     * @var array
     */
    private $orderListRequest;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->orderListResponse = require __DIR__ . '/data/orderListResponse.php';
        $this->orderListRequest = require __DIR__ . '/data/orderListRequest.php';
    }

    /**
     * @throws ApiException
     * @throws ApiServerException
     * @throws ApiClientException
     */
    public function testSend()
    {
        $request = new OrderListRequest();
        $request->limit = $this->orderListRequest['limit'] ?? null;
        $request->offset = $this->orderListRequest['offset'] ?? null;
        $request->dateStart = $this->orderListRequest['dateStart'] ?? null;
        $request->dateEnd = $this->orderListRequest['dateEnd'] ?? null;


        $providerMock = $this->createMock(ApiProvider::class);

        $providerMock->expects($this->once())
            ->method('send')
            ->with('POST', '/order/list', $request->toArray())
            ->willReturn($this->orderListResponse);


        $orderList = new OrderListService($providerMock);

        $result = $orderList->send($request);

        $response = new OrderListResponse();
        $this->assertEquals($response->fromArray($this->orderListResponse), $result);
    }
}
