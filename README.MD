# Itez Payments PHP SDK

This is a set of libraries in the PHP language to ease integration of your service
with the Itez Payments.

Please note that for correct SDK operating you must have at least PHP 7.2.  

## Installation

Install with composer
```bash
composer require itez-payments/payment-sdk-php
```


### Examples

```php

$provider = new ItezPayments\ApiProvider('host', 'apiKey', 'privateKey');
$apiService = new ItezPayments\ApiService($provider);

```

### Sale

```php

$customer = new \ItezPayments\Resources\Common\Customer();
$customer->name = 'Customer Name';
$customer->email = 'Customer Email';

$inputAsset = new \ItezPayments\Resources\Sale\InputCommonAsset();
$inputAsset->currency = 'ETH';
$inputAsset->amount = '0.01149069';

$outputAsset = new \ItezPayments\Resources\Sale\OutputAsset();
$outputAsset->currency = 'BTC';

$saleRequest = new \ItezPayments\Resources\Sale\SaleCommonRequest('payment_id', $customer, $inputAsset, $outputAsset, 'description');
$saleResponse = $apiService->sale($saleRequest);

```

### Payout

```php

$customer = new \ItezPayments\Resources\Payout\Customer();
$customer->name = 'Customer Name';
$customer->email = 'Customer Email';

$inputAsset = new \ItezPayments\Resources\Payout\InputCommonAsset();
$inputAsset->currency = 'ETH';
$inputAsset->amount = '0.01149069';

$outputAsset = new \ItezPayments\Resources\Payout\OutputAsset();
$outputAsset->currency = 'BTC';
$outputAsset->address = '0xe94d8f606601174ed3c5504ef16711e5c12a7f83';

$saleRequest = new \ItezPayments\Resources\Payout\PayoutRequest('payment_id', $customer, $inputAsset, $outputAsset, 'description');
$saleResponse = $apiService->sale($saleRequest);

```

### Get balance by project

```php

$balanceRequest = new \ItezPayments\Resources\Balance\BalanceRequest('ETH');
$balanceResponse = $apiService->getBalances($balanceRequest);

```

### Get Order List

```php

$orderListRequest = new \ItezPayments\Resources\OrderList\OrderListRequest();
$orderListRequest->limit = 10;
$orderListRequest->offset = 0;
$orderListRequest->dateStart = "2022-09-16 23:59:35";
$orderListRequest->dateEnd = "2024-09-16 23:59:35";

$orderListResponse = $apiService->getOrderList($orderListRequest);

```

### Get Order Status
```php

$saleOrderId = '42f70799-a1f1-4a66-bd05-79485255fb84';
$saleOrderStatusResponse = $apiService->getOrderStatus($saleOrderId);

$payoutOrderId = '0b49de78-1082-43c9-806f-9943f4ec52b3';
$payoutOrderStatusResponse = $apiService->getOrderStatus($payoutOrderId);

```
