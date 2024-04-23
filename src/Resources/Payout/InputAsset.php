<?php

namespace ItezPayments\Resources\Payout;

use ItezPayments\Resources\Common\InputCommonAsset;

class InputAsset extends InputCommonAsset
{
    /**
     * @var string|null
     *
     * PayoutService amount actual
     */
    public $amount_actual;
}
