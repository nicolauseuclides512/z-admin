<?php
return [

    "timeout" => 60.0,

    "connect_timeout" => 60.0,

    "connection" => [
        "asset" => [
            "api_url" => env("ASSET_GATEWAY_SERVICE", "http://localhost:9494/api/v1")
        ],
        "ongkir" => [
            "api_url" => env("ONGKIR_GATEWAY_SERVICE", "http://localhost:9797/api/v3/sys"),
        ],
        "store" => [
            "api_url" => env("STORE_GATEWAY_SERVICE", "http://localhost:9393/api/v1"),
        ],
        "account" => [
            "api_url" => env("ACCOUNT_GATEWAY_SERVICE", "http://localhost:9292/api/v1/sys"),
        ],
    ]
];
