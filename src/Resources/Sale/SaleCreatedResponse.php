<?php

namespace ItezPayments\Resources\Sale;

use ItezPayments\Resources\Common\Customer;

class SaleCreatedResponse
{
    /**
     * @var string
     *
     * Internal id
     */
    public $order_id;

    /**
     * @var string|null
     *
     * Merchant generated id
     */
    public $payment_id;

    /**
     * @var string|null
     *
     * Type of order
     */
    public $type;

    /**
     * @var Customer|null
     *
     * Customer object
     */
    public $customer;

    /**
     * @var string
     *
     * Exchange rate
     */
    public $rate;

    /**
     * @var string|null
     *
     * Explorer link to wallet
     */
    public $blockchain_url;

    /**
     * @var string|null
     *
     * Operation status
     */
    public $status;

    /**
     * @var OutputAsset
     */
    public $from;

    /**
     * @var InputAsset
     */
    public $to;

    /**
     * @var Deposit
     */
    public $deposit;

    /**
     * @var string
     *
     * Timestamp
     */
    public $order_expired_at;


    public function fromArray(array $data): SaleCreatedResponse
    {
        $this->order_id = $data['order_id'] ?? null;
        $this->payment_id = $data['payment_id'] ?? null;
        $this->type = $data['type'] ?? null;

        $this->customer = new Customer();
        $this->customer->name = $data['customer']['name'] ?? null;
        $this->customer->email = $data['customer']['email'] ?? null;

        $this->rate = $data['rate'] ?? null;
        $this->blockchain_url = $data['blockchain_url'] ?? null;
        $this->status = $data['status'] ?? null;

        $this->to = new InputAsset();
        $this->to->currency = $data['from']['currency'] ?? null;
        $this->to->network = $data['from']['network'] ?? null;
        $this->to->address = $data['from']['address'] ?? null;
        $this->to->amount = $data['from']['amount'] ?? null;

        $this->from = new OutputAsset();
        $this->from->currency = $data['to']['currency'] ?? null;
        $this->from->network = $data['to']['network'] ?? null;
        $this->from->chain = $data['to']['chain'] ?? null;
        $this->from->amount = $data['to']['amount'] ?? null;
        $this->from->amount_actual = $data['to']['amount_actual'] ?? null;

        $this->deposit = new Deposit();
        $this->deposit->network = $data['deposit']['network'] ?? null;
        $this->deposit->currency = $data['deposit']['currency'] ?? null;
        $this->deposit->chain = $data['deposit']['chain'] ?? null;
        $this->deposit->address = $data['deposit']['address'] ?? null;
        $this->deposit->payment_uri = $data['deposit']['payment_uri'] ?? null;
        $this->deposit->amount_paid = $data['deposit']['amount_paid'] ?? null;
        $this->deposit->amount_payable = $data['deposit']['amount_payable'] ?? null;

        $this->order_expired_at = $data['order_expired_at'] ?? null;

        return $this;
    }

}
