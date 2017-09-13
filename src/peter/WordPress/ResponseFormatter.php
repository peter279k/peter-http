<?php

/*
* This helper class is to fomrat the response body.
*/

namespace peter\WordPress;

class ResponseFormatter {

    private $responseFormat = [];

    public function responseFormat(HttpResponse $responseFormat) {
        $rawBody = $responseFormat->getResponseRawBody;
        $responseBody = $rawBody['body'];
        $httpResponseCode = $rawBody['response']['code'];
        $httpResponseMessage = $rawBody['response']['message'];

        $this->responseFormat = [
            'body' => $responseBody,
            'http-code' => $httpResponseCode,
            'http-message' => $httpResponseMessage,
            'content-type' => $httpResponseMessage,
        ];

        return $this->responseFormat;
    }

    public function setResponseFormat(array $responseFormat) {
        $this->responseFormat = $responseFormat;
    }

    public function getResponseFormat() {
        return $this->responseFormat;
    }
}
