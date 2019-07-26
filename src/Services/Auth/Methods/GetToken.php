<?php

namespace devnick\salesforce\Services\Auth\Methods;

use GuzzleHttp\Client;

class GetToken

{   

    public function execute($account_id, $scope){
        try
        {    
            $headers = [
                'Accept'        => 'application/json',
                'Content-Type'  => 'application/json',
            ];
    
            $body = [
                'grant_type'    => 'client_credentials',
                'client_id'     => env('CLIENT_ID'),
                'client_secret' => env('CLIENT_SECRET'),
                'scope'         => $scope,
                'account_id'    => $account_id,
            ];
    
    
            $client = new Client(
                ['headers' => $headers]
            );

            
            $response = $client->request('POST', config('salesforce.url.auth.v2'), [
                'body' => json_encode($body)
            ]);
            
            $auth = json_decode($response->getBody()->getContents(), true);

            return (object) $auth;

        }catch(\Exception $error){
            return [
                "status"    => $error->getCode(), 
                "msg"       => $error->getMessage()
            ];
        }
        

    }
}