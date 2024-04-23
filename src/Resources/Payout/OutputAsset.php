<?php

namespace ItezPayments\Resources\Payout;

use ItezPayments\Resources\Common\OutputCommonAsset;

class OutputAsset extends OutputCommonAsset
{
    /**
     * @var string|null
     *
     * Customer crypto address
     */
    public $address;

    /**
     * @var string|null
     *
     * PayoutService amount actual
     */
    public $amount_actual;
}
