<?php

namespace App\Traits;

use Illuminate\Support\Facades\Config;

use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

trait Paypal
{
    protected function getApiContext()
    {
        $config = Config::get('paypal');

        $apiContext = new ApiContext(
            new OAuthTokenCredential($config['client_id'], $config['secret'])
        );

        $apiContext->setConfig($config['settings']);

        return $apiContext;
    }
}