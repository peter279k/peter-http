<?php

/*
* This class help you accessing the WordPress HTTP API easily.
*/

namespace peter\WordPress;

class HttpResponse {

    private $response = [];

    public function __construct(array $response) {
        $this->response = $response;
    }

    public function httpResponse() {
        $responseFormat = [
            'html' => 'HtmlResponse',
            'text' => 'TextResponse',
            'json' => 'JsonResponse',
            'xml' => 'XmlResponse',
        ];

        if(empty($this->response['headers']['content-type'])) {
            throw new \RuntimeException('The response body is incorrect!');
        }

        $contentType = $this->response['headers']['content-type'];
        $responseFormatKey = array_keys($responseFormat);
        foreach($responseFormatKey as $key) {
            if(!stristr($contentType, $key)) {
                throw new \RuntimeException('Cannot support this Response data type!');
            }
            $className = 'peter\\WordPress\\'.$responseFormat[$key];
            break;
        }

        return (new $className)->httpResponse($this);
    }

    public function setResponseRawBody(array $response) {
        $this->response = $response;
    }

    public function getResponseRawBody() {
        return $this->response;
    }
}
