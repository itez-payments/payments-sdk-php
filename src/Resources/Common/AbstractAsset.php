<?php

namespace ItezPayments\Resources\Common;

class AbstractAsset
{
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}