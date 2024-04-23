<?php

namespace ItezPayments\Resources\Payout;


use ItezPayments\Resources\Common\AbstractCommonRequest;
use ItezPayments\Resources\Common\Customer;

class PayoutRequest extends AbstractCommonRequest
{
    public function __construct(
        string $payment_id,
        Customer $customer,
        InputAsset $from,
        OutputAsset $to,
        ?string $description = null
    ) {
        parent::__construct($payment_id, $customer, $from, $to, $description);
    }
}
