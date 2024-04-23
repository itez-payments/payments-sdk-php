<?php

namespace ItezPayments\Resources\Sale;

use ItezPayments\Resources\Common\AbstractCommonRequest;
use ItezPayments\Resources\Common\Customer;
use ItezPayments\Resources\Payout\OutputAsset;

class SaleRequest extends AbstractCommonRequest
{

    public function __constructs(
        string $payment_id,
        Customer $customer,
        InputAsset $from,
        OutputAsset $to,
        ?string $description = null
    ) {
        parent::__construct($payment_id, $customer, $from, $to, $description);
    }
}
