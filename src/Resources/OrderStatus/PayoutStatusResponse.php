<?php

namespace ItezPayments\Resources\OrderStatus;

use ItezPayments\Resources\Payout\PayoutCreatedResponse;

class PayoutStatusResponse extends PayoutCreatedResponse
{
    /**
     * @var string|null
     *
     * Decline reason
     */
    public $decline_reason;


    public function fromArray(array $data): PayoutCreatedResponse
    {
        parent::fromArray($data);

        $this->decline_reason = $data['decline_reason'] ?? null;

        return $this;
    }
}
