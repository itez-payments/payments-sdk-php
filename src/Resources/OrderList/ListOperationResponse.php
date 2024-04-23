<?php

namespace ItezPayments\Resources\OrderList;

class ListOperationResponse
{
    /**
     * Operation type
     *
     * @var string
     */
    public $type;

    /**
     * Operation status
     *
     * @var string
     */
    public $status;

    /**
     * @var string
     */
    public $rate;

    /**
     * For SaleService - currency from customer, for payout - null
     *
     * @var CurrencyAmountItemResponse|null
     */
    public $currencyFrom;

    /**
     * For SaleService - null, for payout - pay currency
     *
     * @var CurrencyAmountItemResponse|null
     */
    public $currencyTo;

    /**
     * Reason of decline operation
     *
     * @var string|null
     */
    public $declineReason;

    /**
     * For payout - information about network fee
     *
     * @var NetworkFeeItemResponse|null
     */
    public $networkFee;

    /**
     * Date of operation create
     *
     * @var string
     */
    public $createdAt;

    public function fromArray(array $data): ListOperationResponse
    {
        $this->type = $data['type'];
        $this->status = $data['status'];
        $this->currencyFrom = $data['currencyFrom'] ? (new CurrencyAmountItemResponse())->fromArray(
            $data['currencyFrom']
        ) : null;
        $this->currencyTo = $data['currencyTo'] ? (new CurrencyAmountItemResponse())->fromArray(
            $data['currencyTo']
        ) : null;
        $this->declineReason = $data['declineReason'] ?? null;
        $this->rate = $data['rate'] ?? null;
        $this->networkFee = $data['networkFee'] ? (new NetworkFeeItemResponse())->fromArray($data['networkFee']) : null;
        $this->createdAt = $data['createdAt'];

        return $this;
    }

}
