<?php

/*
* This class helps you processing the response type is JSON data.
*/

namespace peter\Http;

class textResponse implements HttpResponseInterface {

    public function httpResponse(HttpResponse $response) {

        if(!$this->isTextData($response->getResponseRawBody['body'])) {
            return false;
        }

        $className = 'peter\\Http\\ResponseFormatter';

        return (new $className)->responseFormat($response);
    }

    private function isTextData($string) {

        return is_string($string) ? true : false;
    }
}
