<?php

namespace ItezPayments\Resources\Balance;

class BalanceResponse
{
    /**
     * @var BalanceItemResponse[]
     */
    public $items;

    public function fromArray(array $data): BalanceResponse
    {
        $items = [];
        if (!empty($data['items'])) {
            foreach ($data['items'] as $item) {
                $balanceItemResponse = new BalanceItemResponse();
                $balanceItemResponse->currency = $item['currency'] ?? null;
                $balanceItemResponse->total = $item['total'] ?? null;
                $balanceItemResponse->hold = $item['hold'] ?? null;
                $balanceItemResponse->available = $item['available'] ?? null;
                $items[] = $balanceItemResponse;
            }
        }
        $this->items = $items;

        return $this;
    }
}
