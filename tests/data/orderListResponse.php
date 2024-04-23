<?php

return [
    [
        "id"           => "0b49de78-1082-43c9-806f-9943f4ec52b3",
        "paymentId"    => "12121212",
        "type"         => "payout",
        "status"       => "failed",
        "description"  => "Asperiorl.",
        "createdAt"    => "2024-02-20T11:24:20.000Z",
        "currencyFrom" => [
            "code"         => "ETH",
            "amount"       => "0.1",
            "amountActual" => "0"
        ],
        "currencyTo"   => [
            "code"         => "ETH",
            "amount"       => "0.1",
            "amountActual" => "0"
        ],
        "operations"   => [
            [
                "type"          => "payout",
                "status"        => "failed",
                "createdAt"     => "2024-02-20T11:24:20.000Z",
                "declineReason" => "Failed by AML",
                "currencyFrom"  => null,
                "currencyTo"    => [
                    "code"         => "ETH",
                    "amount"       => "0.1",
                    "amountActual" => "0",
                    "address"      => "0x2b87b4b23ac626cd89339ba31364d65deaa5526b",
                    "addressExtra" => null
                ],
                "rate"          => "1",
                "networkFee"    => [
                    "currency"           => [
                        "code"         => "ETH",
                        "amount"       => "0",
                        "amountActual" => null,
                        "rate"         => "1"
                    ],
                    "withdrawalCurrency" => [
                        "code"    => "ETH",
                        "network" => "ethereum",
                        "chain"   => null,
                        "amount"  => null
                    ]
                ]
            ]
        ]
    ],
    [
        "id"           => "042d1c71-c8eb-4c33-8f70-d97b6caa40e9",
        "paymentId"    => "68u7zgfu-vlmb-rt2i-iy5w-736g41829imi",
        "type"         => "payout",
        "status"       => "expired",
        "description"  => "Fugit dic.",
        "createdAt"    => "2023-10-29T21:35:16.000Z",
        "currencyFrom" => [
            "code"         => "ETH",
            "amount"       => "0.168554050505050505",
            "amountActual" => "0"
        ],
        "currencyTo"   => [
            "code"         => "USDTERC20",
            "network"      => "ethereum",
            "amount"       => "166.86851",
            "amountActual" => "0"
        ],
        "operations"   => [
            [
                "type"          => "payout",
                "status"        => "expired",
                "createdAt"     => "2023-10-29T21:35:16.000Z",
                "declineReason" => null,
                "currencyFrom"  => [
                    "code"         => "ETH",
                    "amount"       => "0.168554050505050505",
                    "amountActual" => "0",
                    "address"      => "0x2f233bac433239ff2dd58388238eacb4a6e4f227",
                    "addressExtra" => null
                ],
                "currencyTo"    => null,
                "rate"          => "990",
                "networkFee"    => [
                    "currency"           => [
                        "code"         => "ETH",
                        "amount"       => "0",
                        "amountActual" => null,
                        "rate"         => "0"
                    ],
                    "withdrawalCurrency" => [
                        "code"    => "ETH",
                        "network" => "ethereum",
                        "chain"   => null,
                        "amount"  => null
                    ]
                ]
            ]
        ]
    ],
    [
        "id"           => "58dfab46-9a5a-4057-9ee3-cdbcce94f49d",
        "paymentId"    => "tl2vdabu-7ow7-gdgp-36lw-s9w849iu9q15",
        "type"         => "sale",
        "status"       => "new",
        "description"  => "Excepturt.",
        "createdAt"    => "2023-10-29T21:25:54.000Z",
        "currencyFrom" => [
            "code"         => "ETH",
            "amount"       => "0.006760539130401869",
            "amountActual" => "0"
        ],
        "currencyTo"   => [
            "code"         => "USDTERC20",
            "network"      => "ethereum",
            "amount"       => "6.692934",
            "amountActual" => "0"
        ],
        "operations"   => [
            [
                "type"          => "payin",
                "status"        => "awaiting_payment",
                "createdAt"     => "2023-10-29T21:25:54.000Z",
                "declineReason" => null,
                "currencyFrom"  => [
                    "code"         => "ETH",
                    "amount"       => "0.006760539130401869",
                    "amountActual" => "0",
                    "address"      => "0x18e2126508ec08b5098e1b388e379ab8fbfc7c46",
                    "addressExtra" => null
                ],
                "currencyTo"    => null,
                "rate"          => "990",
                "networkFee"    => null
            ]
        ]
    ],
    [
        "id"           => "be37d867-a58b-4426-bc4f-3c8135fa333f",
        "paymentId"    => "g4v504g8-le5o-5dn1-adlp-z1xqlm1s2n50",
        "type"         => "sale",
        "status"       => "new",
        "description"  => "Quas id k.",
        "createdAt"    => "2023-10-29T21:08:50.000Z",
        "currencyFrom" => [
            "code"         => "ETH",
            "amount"       => "0.862444241414141414",
            "amountActual" => "0"
        ],
        "currencyTo"   => [
            "code"         => "USDTERC20",
            "network"      => "ethereum",
            "amount"       => "853.819799",
            "amountActual" => "0"
        ],
        "operations"   => [
            [
                "type"          => "payin",
                "status"        => "awaiting_payment",
                "createdAt"     => "2023-10-29T21:08:50.000Z",
                "declineReason" => null,
                "currencyFrom"  => [
                    "code"         => "ETH",
                    "amount"       => "0.862444241414141414",
                    "amountActual" => "0",
                    "address"      => "0x37e066ea883d99663133ed30238040ce6c18f25b",
                    "addressExtra" => null
                ],
                "currencyTo"    => null,
                "rate"          => "990",
                "networkFee"    => null
            ]
        ]
    ],
    [
        "id"           => "a15982ab-f553-49b1-9c11-e4cd8ece7796",
        "paymentId"    => "y0l6fp34-4w91-o27o-722h-l7932y7k7474",
        "type"         => "sale",
        "status"       => "new",
        "description"  => "Sapiented.",
        "createdAt"    => "2023-10-29T20:59:13.000Z",
        "currencyFrom" => [
            "code"         => "ETH",
            "amount"       => "0.008300286183377033",
            "amountActual" => "0"
        ],
        "currencyTo"   => [
            "code"         => "USDTERC20",
            "network"      => "ethereum",
            "amount"       => "8.217283",
            "amountActual" => "0"
        ],
        "operations"   => [
            [
                "type"          => "payin",
                "status"        => "awaiting_payment",
                "createdAt"     => "2023-10-29T20:59:13.000Z",
                "declineReason" => null,
                "currencyFrom"  => [
                    "code"         => "ETH",
                    "amount"       => "0.008300286183377033",
                    "amountActual" => "0",
                    "address"      => "0x8d8ec9b62f78dc9d302d9cb67c11a9b9e2c0c0d2",
                    "addressExtra" => null
                ],
                "currencyTo"    => null,
                "rate"          => "990",
                "networkFee"    => null
            ]
        ]
    ]
];
