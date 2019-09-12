<?php

namespace devnick\salesforce\Services\DataExtensions\Methods;

use GuzzleHttp\Client;

class SetDataExtension

{
    protected $client;
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function execute($data_extension, $params, $url = null){
        try
        {    
            $base_uri = config('salesforce.url.data_extension.row_set');
            if($url){
                $base_uri = $url;
            }
            $uri = $base_uri . "key:" . $data_extension . "/rowset";

            $response = $this->client->request('POST', $uri, [
                'body' => json_encode($params)
            ]);
    
            return json_decode($response->getBody()->getContents(), true);

        }catch(\Exception $error){
            return [
                "status" => $error->getCode(), 
                "msg" => $error->getMessage()
            ];
        }
        

    }
}