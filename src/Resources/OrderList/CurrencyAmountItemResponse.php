<?php

namespace ItezPayments\Resources\OrderList;

class CurrencyAmountItemResponse
{
    /**
     * Currency code
     *
     * @var string
     */
    public $code;

    /**
     * Currency network
     *
     * @var string|null
     */
    public $network;

    /**
     * Amount
     *
     * @var string|null
     */
    public $amount;

    /**
     * Amount Actual
     *
     * @var string|null
     */
    public $amountActual;

    /**
     * Exchange rate
     *
     * @var string|null
     */
    public $rate;

    /**
     * Blockchain address
     *
     * @var string|null
     */
    public $address;

    /**
     * Blockchain address metadata
     *
     * @var string|null
     */
    public $addressExtra;

    public function fromArray(array $data): CurrencyAmountItemResponse
    {
        $this->code = $data['code'];
        $this->network = $data['network'] ?? null;
        $this->amount = $data['amount'] ?? null;
        $this->amountActual = $data['amountActual'] ?? null;
        $this->rate = $data['rate'] ?? null;
        $this->address = $data['address'] ?? null;
        $this->addressExtra = $data['addressExtra'] ?? null;

        return $this;
    }

}
