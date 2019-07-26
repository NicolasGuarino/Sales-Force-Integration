<?php

namespace devnick\salesforce\Services\DataExtensions;

use devnick\salesforce\Services\GeneralService;

class DataExtensionsConnector extends GeneralService
{
    protected $client;

    public function __construct($auth=null)
    {
        $this->client = $this->getClient($auth);
    }

    public function __call($method, $parameters)
    {
        if (! class_exists($class = $this->getClassNameFromMethod($method))) {
            throw new \Exception("Method {$method} does not exist");
        }

        $instance = new $class($this->client);

        // Delegate the handling of this method call to the appropriate class
        return call_user_func_array([$instance, 'execute'], $parameters);
    }

    private function getClassNameFromMethod($method)
    {
        return 'devnick\\salesforce\\Services\\DataExtensions\\Methods\\' . ucwords($method);
    }

}
