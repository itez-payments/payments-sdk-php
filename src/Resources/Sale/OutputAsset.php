<?php

namespace ItezPayments\Resources\Sale;

use ItezPayments\Resources\Common\OutputCommonAsset;

class OutputAsset extends OutputCommonAsset
{
    /**
     * string|null
     */
    public $amount_actual = null;

    /**
     * string|null
     */
    public $addressRefund = null;
}
