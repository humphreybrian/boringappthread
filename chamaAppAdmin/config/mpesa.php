<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Account
    |--------------------------------------------------------------------------
    |
    | This is the default account to be used when none is specified.
    */

    'default' => 'staging',

    /*
    |--------------------------------------------------------------------------
    | Native File Cache Location
    |--------------------------------------------------------------------------
    |
    | When using the Native Cache driver, this will be the relative directory
    | where the cache information will be stored.
    */

    'cache_location' => '../cache',

    /*
    |--------------------------------------------------------------------------
    | Accounts
    |--------------------------------------------------------------------------
    |
    | These are the accounts that can be used with the package. You can configure
    | as many as needed. Two have been setup for you.
    |
    | Sandbox: Determines whether to use the sandbox, Possible values: sandbox | production
    | Initiator: This is the username used to authenticate the transaction request
    | LNMO:
    |    paybill: Your paybill number
    |    shortcode: Your business shortcode
    |    passkey: The passkey for the paybill number
    |    callback: Endpoint that will be be queried on completion or failure of the transaction.
    |
    */

    'accounts' => [
        'staging' => [
            'sandbox' => true,
            'key' => 'SARY26Ix8nQMX1HqqLJ0a5lDsngdvDr8',
            'secret' => 'GwA6n6R0Vk4bZp4Q',
            'initiator' => 'apitest363',
            'id_validation_callback' => 'http://payments.smodavproductions.com/checkout.php',
            'lnmo' => [
                'paybill' => 174379,
                'shortcode' => 174379,
                'passkey' => 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919',
                'callback' => 'http://198c8f9d1929.ngrok.io/api/payment',
            ]
        ],

        'production' => [
            'sandbox' => false,
            'key' => 'SARY26Ix8nQMX1HqqLJ0a5lDsngdvDr8',
            'secret' => 'GwA6n6R0Vk4bZp4Q',
            'initiator' => 'apitest363',
            'id_validation_callback' => 'http://payments.smodavproductions.com/checkout.php',
            'lnmo' => [
                'paybill' => 174379,
                'shortcode' => 174379,
                'passkey' => 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919',
                'callback' => 'http://198c8f9d1929.ngrok.io/api/payment',
            ]
        ],
    ],
];
