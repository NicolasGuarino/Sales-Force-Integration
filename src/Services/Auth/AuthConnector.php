<?php

namespace devnick\salesforce\Services\Auth;

class AuthConnector
{
    protected $client;

    public function __construct($auth=null)
    {
        $this->client = null;
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
        return 'devnick\\salesforce\\Services\\Auth\\Methods\\' . ucwords($method);
    }

}
