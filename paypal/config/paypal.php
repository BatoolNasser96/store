<?php

return [ 
    'client_id' => env('PAYPAL_CLIENT_ID', ''),
    'secret' => env('PAYPAL_SECRET', ''),
    'settings' => array(
        'mode' => env('PAYPAL_MODE', 'sandbox'),
        'http.CURLOPT_CONNECTTIMEOUT' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'DEBUG',
        //'cache.enabled' => true,
        //'cache.FileName' => '/PaypalCache' // for determining paypal cache directory
        //'http.headers.PayPal-Partner-Attribution-Id' => '123123123'
        //'log.AdapterFactory' => '\PayPal\Log\DefaultLogFactory' // Factory class implementing \PayPal\Log\PayPalLogFactory
    ),
];