<?php

namespace ItezPayments\Tests;

use ItezPayments\ApiProvider;
use ItezPayments\Exception\ApiClientException;
use ItezPayments\Exception\ApiException;
use ItezPayments\Exception\ApiServerException;
use ItezPayments\Resources\Common\Customer;
use ItezPayments\Resources\Sale\InputAsset;
use ItezPayments\Resources\Sale\OutputAsset;
use ItezPayments\Resources\Sale\SaleCreatedResponse;
use ItezPayments\Resources\Sale\SaleRequest;
use ItezPayments\Services\SaleService;
use PHPUnit\Framework\TestCase;


class SaleTest extends TestCase
{

    /**
     * @var array
     */
    private $saleResponse;

    /**
     * @var array
     */
    private $saleRequest;


    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->saleResponse = require __DIR__ . '/data/saleResponse.php';
        $this->saleRequest = require __DIR__ . '/data/saleRequest.php';
    }

    /**
     * @throws ApiException
     * @throws ApiServerException
     * @throws ApiClientException
     */
    public function testSend()
    {
        $customer = new Customer();
        $customer->id = $this->saleRequest['customer']['id'] ?? null;
        $customer->name = $this->saleRequest['customer']['name'] ?? null;
        $customer->email = $this->saleRequest['customer']['email'] ?? null;

        $to = new InputAsset();
        $to->currency = $this->saleRequest['to']['currency'];
        $to->address = $this->saleRequest['to']['address'];
        $to->amount = $this->saleRequest['to']['amount'];

        $from = new OutputAsset();
        $from->currency = $this->saleRequest['from']['currency'];


        $payment = new SaleRequest(
            $this->saleRequest['payment_id'],
            $customer,
            $to,
            $from,
            $this->saleRequest['description']
        );

        $providerMock = $this->createMock(ApiProvider::class);

        $providerMock->expects($this->once())
            ->method('send')
            ->with('POST', '/order/sale', $payment->toArray())
            ->willReturn($this->saleResponse);


        $sale = new SaleService($providerMock);

        $result = $sale->send($payment);

        $saleResponse = new SaleCreatedResponse();
        $this->assertEquals($saleResponse->fromArray($this->saleResponse), $result);
    }
}
