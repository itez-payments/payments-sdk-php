<?php

namespace ItezPayments\Resources\OrderList;

class NetworkFeeItemResponse
{
    /**
     * Data of network fee
     *
     * @var CurrencyAmountItemResponse
     */
    public $currency;

    /**
     * Data of converted network fee
     *
     * @var CurrencyAmountItemResponse|null
     */
    public $withdrawalCurrency;

    public function fromArray(array $data): NetworkFeeItemResponse
    {
        $this->currency = (new CurrencyAmountItemResponse())->fromArray($data['currency']);
        $this->withdrawalCurrency = (new CurrencyAmountItemResponse())->fromArray($data['withdrawalCurrency']);

        return $this;
    }
}
