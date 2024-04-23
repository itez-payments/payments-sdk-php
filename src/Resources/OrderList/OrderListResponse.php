<?php

namespace ItezPayments\Resources\OrderList;

class OrderListResponse
{
    /**
     * @var OrderListItemResponse[]
     */
    public $items;

    public function fromArray(array $data): OrderListResponse
    {
        $items = [];
        foreach ($data as $item) {
            $itemResponse = new OrderListItemResponse();
            $itemResponse->fromArray($item);
            $items[] = $itemResponse;
        }
        $this->items = $items;

        return $this;
    }
}
