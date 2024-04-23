<?php

return [
    "order_id"       => "0b49de78-1082-43c9-806f-9943f4ec52b3",
    "payment_id"     => "12121212",
    "type"           => "payout",
    "status"         => "new",
    "customer"       => [
        "id"                => 3068,
        "name"              => "Black Panther",
        "email"             => "krzysztof+okeke@unaref.org",
        "verification_link" => null
    ],
    "from"           => [
        "currency"      => "ETH",
        "amount"        => "0.1",
        "amount_actual" => "0"
    ],
    "to"             => [
        "currency"      => "ETH",
        "amount"        => "0.1",
        "address"       => "0x2b87b4b23ac626cd89339ba31364d65deaa5526b",
        "amount_actual" => "0"
    ],
    "rate"           => "1",
    "blockchain_url" => "https://etherscan.io/address/0x2b87b4b23ac626cd89339ba31364d65deaa5526b",
    "network_fee"    => [
        "amount"              => "0",
        "currency"            => "ETH",
        "rate"                => "1",
        "withdrawal_currency" => "ETH",
        "withdrawal_network"  => "ethereum",
        "withdrawal_chain"    => null,
        "withdrawal_amount"   => "0"
    ]
];
