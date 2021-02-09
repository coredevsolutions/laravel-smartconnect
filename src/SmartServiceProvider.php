<?php

namespace CoreDev\LaravelSmartConnect;

use Illuminate\Support\ServiceProvider;
use CoreDev\LaravelSmartConnect\SmartApi;
use GuzzleHttp\Client;

class SmartServiceProvider extends ServiceProvider
{   
    public function register() {
        $this->app->singleton('smart', function() {
            $client = new Client([
                'base_uri' => 'https://messagingsuite.smart.com.ph'
            ]);

            return new SmartApi($client);
        });
    }
}