<?php

namespace ItezPayments\Resources\OrderList;

class OrderListRequest
{
    /**
     * @var int|null
     */
    public $offset;

    /**
     * @var int|null
     */
    public $limit;

    /**
     * @var string|null
     */
    public $type;

    /**
     * @var string|null
     */
    public $status;

    /**
     * @var string|null
     */
    public $dateStart;

    /**
     * @var string|null
     */
    public $dateEnd;

    public function __construct(
        ?string $offset = null,
        ?string $limit = null,
        ?string $type = null,
        ?string $status = null,
        ?string $dateStart = null,
        ?string $dateEnd = null
    ) {
        $this->offset = $offset;
        $this->limit = $limit;
        $this->type = $type;
        $this->status = $status;
        $this->dateStart = $dateStart;
        $this->dateEnd = $dateEnd;
    }


    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
