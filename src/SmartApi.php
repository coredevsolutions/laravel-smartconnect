<?php

namespace CoreDev\LaravelSmartConnect;

use Illuminate\Support\Facades\Cache;
use GuzzleHttp\Client;
use Carbon\Carbon;

class SmartApi 
{
    protected $client;

    public function __construct(Client $client) {
        $this->client = $client;
    }

    public function send(string $number, string $message, string $username, string $password) {
        $authentication = Cache::remember('smart-sms-auth-token-' . $username, Carbon::now()->addMinutes(30), function() use ($username, &$password) {
            return json_decode($this->client->post('/rest/auth/login', [
                'json' => [
                    'username' => $username,
                    'password' => $password
                ]
            ])->getBody()->getContents(), true);
        });

        return $this->client->post('/cgpapi/messages/sms', [
            'headers' => [
                'Authorization' => 'Bearer ' . $authentication['accessToken']
            ],
            'json' => [
                'messageType' => 'sms',
                'destination' => $number,
                'text' => $message
            ]
        ]);
        
    }
}