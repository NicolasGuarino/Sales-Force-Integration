<?php

namespace devnick\salesforce\Services\Auth\Methods;

use GuzzleHttp\Client;

class GetToken{   

    public function execute($account_id, $scope, $auth_data = null)
    {
        try{    
            $headers = [
                'Accept'        => 'application/json',
                'Content-Type'  => 'application/json',
            ];
    
            $client = new Client(
                ['headers' => $headers]
            );

            if($auth_data){
                $base_uri = $auth_data->base_uri;
                $body = [
                    'grant_type'    => 'client_credentials',
                    'client_id'     => $auth_data->client_id,
                    'client_secret' => $auth_data->client_secret,
                    'scope'         => $scope,
                    'account_id'    => $account_id,
                ];

                $response = $client->request('POST', $base_uri, [
                    'body' => json_encode($body)
                ]);
            }else{
                $body = [
                    'grant_type'    => 'client_credentials',
                    'client_id'     => env('CLIENT_ID'),
                    'client_secret' => env('CLIENT_SECRET'),
                    'scope'         => $scope,
                    'account_id'    => $account_id,
                ];

                $response = $client->request('POST', config('salesforce.url.auth.v2'), [
                    'body' => json_encode($body)
                ]);
            }
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
