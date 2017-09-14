<?php

/*
* This class help you accessing the WordPress HTTP API easily.
*/

namespace peter\Http;

class HttpRequest {

    private $requestUrl = '';
    private $httpMethod = '';
    private $args = [];
    private $curl = null;

    public function __construct($requestUrl, $httpMethod, array $args = []) {
        $this->requestUrl = $requestUrl;
        $this->httpMethod = $httpMethod;

        $this->args = $args;
        $this->curl = curl_init($this->requestUrl);
        curl_setopt_array($this->curl, $args);
    }

    public function httpRequest() {
        $requestFormat = [
            'GET' => 'HttpGetRequest',
            'POST' => 'HttpPostRequest',
        ];

        if(!array_key_exists($this->httpMethod, $requestFormat)) {
            throw new \RuntimeException('Incorrect HTTP method request!');
        }

        $className = 'peter\\Http\\'.$requestFormat[$this->httpMethod];

        return (new $className)->httpRequest($this);
    }

    public function setHttpMethod($httpMethod) {
        $this->args['method'] = $httpMethod;
        $this->httpMethod = $httpMethod;
    }

    public function setRequestUrl($requestUrl) {
        $this->requestUrl = $requestUrl;
    }

    public function setArgs(array $args) {
        $this->args = $args;
    }

    public function getHttpMethod() {
        return $this->httpMethod;
    }

    public function getRequestUrl() {
        return $this->requestUrl;
    }

    public function getArgs() {
        return $this->args;
    }
}
