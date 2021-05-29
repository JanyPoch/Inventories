<?php
return [
    "supported_models" => [
        "bundle" => \JanyPoch\Inventories\Models\Bundle::class,
      //  "wallet" => \App\Models\Wallet::class
    ],
    "bundleable"       => [],
    "categories"       => [
        "money"  => ["wallet"],
        "bundles" => ["bundle", "services"]
    ]
];
