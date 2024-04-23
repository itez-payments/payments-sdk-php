<?php

namespace ItezPayments\Resources\Sale;

class Deposit
{
    /**
     * @var string|null
     *
     * Smart contract network (ethereum, tron, solana, etc ...)
     */
    public $network;

    /**
     * @var string|null
     *
     * Currency code
     */
    public $currency;

    /**
     * @var string|null
     *
     * Smart contract chain (ERC20, TRC20, etc ...)
     */
    public $chain;

    /**
     * @var string|null
     *
     * itez crypto address
     */
    public $address;

    /**
     * @var string|null
     *
     * QR code with payment data
     */
    public $payment_uri;

    /**
     * @var string|null
     *
     * SaleService amount actual
     */
    public $amount_paid;

    /**
     * @var string|null
     *
     * SaleService amount payable
     */
    public $amount_payable;

    public function __construct(
        ?string $network = null,
        ?string $currency = null,
        ?string $chain = null,
        ?string $address = null,
        ?string $payment_uri = null,
        ?string $amount_paid = null,
        ?string $amount_payable = null
    ) {
        $this->network = $network;
        $this->currency = $currency;
        $this->chain = $chain;
        $this->address = $address;
        $this->payment_uri = $payment_uri;
        $this->amount_paid = $amount_paid;
        $this->amount_payable = $amount_payable;
    }

}
