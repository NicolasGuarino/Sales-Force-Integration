<?php 

return [
    "url" => [
        "auth" => [
            'v2' => "https://".env('SALES_FORCE_URL').".auth.marketingcloudapis.com/v2/token"
        ],
        
        "data_extension" => [
            'row_set' => 'https://' . env('SALES_FORCE_URL') .'.rest.marketingcloudapis.com/hub/v1/dataevents/'
        ]
    ]
];