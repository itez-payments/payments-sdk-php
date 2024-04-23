<?php

namespace ItezPayments\Resources\Common;

class InputCommonAsset extends AbstractAsset
{
    /**
     * string
     */
    public $currency;

    /**
     * string|null
     */
    public $network = null;

    /**
     * string|null
     */
    public $amount = null;
}