<?php

namespace ItezPayments\Resources\OrderList;

class OrderListItemResponse
{
    /**
     * Order Id
     *
     * @var string
     */
    public $id;

    /**
     * Merchant`s order ID
     *
     * @var string
     */
    public $paymentId;

    /**
     * Order type
     *
     * @var string
     */
    public $type;

    /**
     * Order status
     *
     * @var string
     */
    public $status;

    /**
     * Order description
     *
     * @var string
     */
    public $description;

    /**
     * For SaleService - currency from customer, for payout - withdrawal
     *
     * @var CurrencyAmountItemResponse
     */
    public $currencyFrom;

    /**
     * For SaleService - credited currency, for payout - payout currency
     *
     * @var CurrencyAmountItemResponse
     */
    public $currencyTo;

    /**
     * List of order operations
     *
     * @var ListOperationResponse[]
     */
    public $operations;

    /**
     * Date of order create
     *
     * @var string
     */
    public $createdAt;

    public function fromArray(array $data): OrderListItemResponse
    {
        $this->id = $data['id'];
        $this->paymentId = $data['paymentId'];
        $this->type = $data['type'];
        $this->status = $data['status'];
        $this->description = $data['description'];
        $this->currencyFrom = (new CurrencyAmountItemResponse())->fromArray($data['currencyFrom']);
        $this->currencyTo = (new CurrencyAmountItemResponse())->fromArray($data['currencyTo']);
        $operations = [];
        foreach ($data['operations'] as $item) {
            $itemResponse = new ListOperationResponse();
            $itemResponse->fromArray($item);
            $operations[] = $itemResponse;
        }
        $this->operations = $operations;

        return $this;
    }
}
