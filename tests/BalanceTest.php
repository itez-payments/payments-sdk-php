<?php

namespace ItezPayments\Tests;

use ItezPayments\ApiProvider;
use ItezPayments\Exception\ApiClientException;
use ItezPayments\Exception\ApiException;
use ItezPayments\Exception\ApiServerException;
use ItezPayments\Resources\Balance\BalanceRequest;
use ItezPayments\Resources\Balance\BalanceResponse;
use ItezPayments\Services\BalanceService;
use PHPUnit\Framework\TestCase;


class BalanceTest extends TestCase
{

    /**
     * @var array
     */
    private $balanceResponse;

    /**
     * @var array
     */
    private $balanceRequest;


    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->balanceResponse = require __DIR__ . '/data/balanceResponse.php';
        $this->balanceRequest = require __DIR__ . '/data/balanceRequest.php';
    }

    /**
     * @throws ApiServerException
     * @throws ApiException
     * @throws ApiClientException
     */
    public function testSend()
    {
        $request = new BalanceRequest($this->balanceRequest['currency']);

        $providerMock = $this->createMock(ApiProvider::class);

        $providerMock->expects($this->once())
            ->method('send')
            ->with('POST', '/balance', $request->toArray())
            ->willReturn($this->balanceResponse);


        $balance = new BalanceService($providerMock);

        $result = $balance->send($request);

        $response = new BalanceResponse();
        $this->assertEquals($response->fromArray($this->balanceResponse), $result);
    }
}
