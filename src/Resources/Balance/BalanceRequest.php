<?php

namespace ItezPayments\Resources\Balance;

class BalanceRequest
{
    /**
     * @var string
     *
     * Currency code
     */
    public $currency;

    public function __construct(
        string $currency
    ) {
        $this->currency = $currency;
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
