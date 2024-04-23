<?php

namespace ItezPayments\Resources\Payout;

use ItezPayments\Resources\Common\Customer;

class PayoutCreatedResponse
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
     * @var InputAsset
     *
     * From asset
     */
    public $from;

    /**
     * @var OutputAsset
     *
     * To asset
     */
    public $to;

    /**
     * @var NetworkFee
     *
     * Network fee
     */
    public $network_fee;

    public function fromArray(array $data): PayoutCreatedResponse
    {
        $this->order_id = $data['order_id'];
        $this->payment_id = $data['payment_id'] ?? null;
        $this->type = $data['type'] ?? null;

        if (isset($data['customer'])) {
            $this->customer = new Customer();
            $this->customer->id = $data['customer']['id'] ?? null;
            $this->customer->name = $data['customer']['name'] ?? null;
            $this->customer->email = $data['customer']['email'] ?? null;
        }

        $this->rate = $data['rate'];
        $this->blockchain_url = $data['blockchain_url'] ?? null;
        $this->status = $data['status'] ?? null;

        $this->from = new InputAsset();
        $this->from->currency = $data['from']['currency'];
        $this->from->network = $data['from']['network'] ?? null;
        $this->from->amount = $data['from']['amount'];
        $this->from->amount_actual = $data['from']['amount_actual'];

        $this->to = new OutputAsset();
        $this->to->currency = $data['to']['currency'];
        $this->to->network = $data['to']['network'] ?? null;
        $this->to->chain = $data['to']['chain'] ?? null;
        $this->to->address = $data['to']['address'] ?? null;
        $this->to->amount = $data['to']['amount'] ?? null;
        $this->to->amount_actual = $data['to']['amount_actual'] ?? null;

        $this->network_fee = new NetworkFee();
        $this->network_fee->amount = $data['network_fee']['amount'];
        $this->network_fee->currency = $data['network_fee']['currency'];
        $this->network_fee->rate = $data['network_fee']['rate'];
        $this->network_fee->withdrawal_currency = $data['network_fee']['withdrawal_currency'];
        $this->network_fee->withdrawal_network = $data['network_fee']['withdrawal_network'] ?? null;
        $this->network_fee->withdrawal_chain = $data['network_fee']['withdrawal_chain'] ?? null;
        $this->network_fee->withdrawal_amount = $data['network_fee']['withdrawal_amount'];

        return $this;
    }

}
