<?php

namespace devnick\salesforce\Services;
use GuzzleHttp\Client;

class GeneralService
{
    public function __construct()
    {

    }

    public function getClient($auth=null)
    {
        if($auth){
            $headers = [
                'Accept'              => 'application/json',
                'Content-Type'        => 'application/json',
                'Authorization'       => $auth->token_type . " " . $auth->access_token
            ];

            $client = new Client(
                ['headers' => $headers]
            );
            
        }else{
            return [
                'status'    => '401',
                'message'   => 'Unauthorized'
            ];
        }

        return $client;
    }
}
