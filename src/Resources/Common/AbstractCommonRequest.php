<?php

namespace ItezPayments\Resources\Common;

class AbstractCommonRequest
{
    public $payment_id;
    public $customer;
    public $from;
    public $to;
    public $description;

    public function __construct(
        string $payment_id,
        Customer $customer,
        InputCommonAsset $from,
        OutputCommonAsset $to,
        ?string $description = null
    ) {
        $this->payment_id = $payment_id;
        $this->customer = $customer;
        $this->from = $from;
        $this->to = $to;
        $this->description = $description;
    }


    public function toArray(): array
    {
        $array = [];
        $properties = get_object_vars($this);

        foreach ($properties as $key => $value) {
            if (is_object($value)) {
                $array[$key] = $value->toArray();
            } else {
                $array[$key] = $value;
            }
        }

        return $array;
    }
}