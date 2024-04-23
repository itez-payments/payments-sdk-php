<?php

namespace ItezPayments\Resources\OrderStatus;

use ItezPayments\Resources\Sale\Confirmation;
use ItezPayments\Resources\Sale\SaleCreatedResponse;

class SaleStatusResponse extends SaleCreatedResponse
{
    /**
     * @var string|null
     *
     * Payed volume
     */
    public $crypto_amount_payed;

    /**
     * @var string|null
     *
     * Decline reason
     */
    public $decline_reason;

    /**
     * @var Confirmation[]
     */
    public $confirmation;


    public function fromArray(array $data): SaleCreatedResponse
    {
        parent::fromArray($data);

        $this->crypto_amount_payed = $data['crypto_amount_payed'] ?? null;
        $this->decline_reason = $data['decline_reason'] ?? null;

        $confirmations = [];
        if (!empty($data['confirmation'])) {
            foreach ($data['confirmation'] as $item) {
                $confirmation = new Confirmation();
                $confirmation->current = $item['current'] ?? null;
                $confirmation->hash = $item['hash'] ?? null;
                $confirmation->required = $item['required'] ?? null;
                $confirmations[] = $confirmation;
            }
        }
        $this->confirmation = $confirmations;

        return $this;
    }
}
