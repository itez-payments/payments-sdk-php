<?php

namespace ItezPayments\Tests;

use ItezPayments\ApiProvider;
use ItezPayments\Exception\ApiClientException;
use ItezPayments\Exception\ApiException;
use ItezPayments\Exception\ApiServerException;
use ItezPayments\Resources\Common\Customer;
use ItezPayments\Resources\Payout\InputAsset;
use ItezPayments\Resources\Payout\OutputAsset;
use ItezPayments\Resources\Payout\PayoutCreatedResponse;
use ItezPayments\Resources\Payout\PayoutRequest;
use ItezPayments\Services\PayoutService;
use PHPUnit\Framework\TestCase;

class PayoutTest extends TestCase
{

    /**
     * @var array
     */
    private $payoutResponse;

    /**
     * @var array
     */
    private $payoutRequest;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->payoutResponse = require __DIR__ . '/data/payoutResponse.php';
        $this->payoutRequest = require __DIR__ . '/data/payoutRequest.php';
    }

    /**
     * @throws ApiException
     * @throws ApiServerException
     * @throws ApiClientException
     */
    public function testSend()
    {
        $customer = new Customer();
        $customer->id = $this->payoutRequest['customer']['id'] ?? null;
        $customer->name = $this->payoutRequest['customer']['name'] ?? null;
        $customer->email = $this->payoutRequest['customer']['email'] ?? null;

        $from = new InputAsset();
        $from->currency = $this->payoutRequest['from']['currency'];
        $from->amount = $this->payoutRequest['from']['amount'];

        $to = new OutputAsset();
        $to->currency = $this->payoutRequest['to']['currency'];
        $to->address = $this->payoutRequest['to']['address'];

        $payment = new PayoutRequest(
            $this->payoutRequest['payment_id'],
            $customer,
            $from,
            $to,
            $this->payoutRequest['description']
        );

        $providerMock = $this->createMock(ApiProvider::class);

        $providerMock->expects($this->once())
            ->method('send')
            ->with('POST', '/order/payout', $payment->toArray())
            ->willReturn($this->payoutResponse);


        $payout = new PayoutService($providerMock);

        $result = $payout->send($payment);

        $saleResponse = new PayoutCreatedResponse();
        $this->assertEquals($saleResponse->fromArray($this->payoutResponse), $result);
    }
}
