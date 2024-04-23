<?php

namespace ItezPayments\Resources\Payout;

class NetworkFee
{
    /**
     * @var string
     *
     * Fee amount
     */
    public $amount;

    /**
     * @var string
     *
     * Fee currency code
     */
    public $currency;

    /**
     * @var string
     *
     * Rate from fee currency (native currency) to withdrawal (merchant base) currency
     */
    public $rate;

    /**
     * @var string
     *
     * Withdrawal currency code
     */
    public $withdrawal_currency;

    /**
     * @var string|null
     *
     * Smart contract network (ethereum, tron, solana, etc ...)
     */
    public $withdrawal_network;

    /**
     * @var string|null
     *
     * Main, goerli, etc
     */
    public $withdrawal_chain;

    /**
     * @var string
     *
     * Fee amount
     */
    public $withdrawal_amount;
}
