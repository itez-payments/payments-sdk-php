<?php

namespace ItezPayments\Resources\Common;

class OutputCommonAsset extends AbstractAsset
{
    /**
     * @var string
     *
     * Currency code
     */
    public $currency;

    /**
     * @var string|null
     *
     * smart contract network (ethereum, tron, solana, etc ...)
     */
    public $network;

    /**
     * @var string|null
     *
     * smart contract chain (ERC20, TRC20, etc ...)
     */
    public $chain;

    /**
     * @var string|null
     *
     * PayoutService amount
     */
    public $amount;
}