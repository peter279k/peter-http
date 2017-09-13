<?php

/*
* This class helps you processing the response type is JSON data.
*/

namespace peter\WordPress;

class JsonResponse implements HttpResponseInterface {

    public function httpResponse(HttpResponse $response) {

        if(!$this->isJsonData($response['body'])) {
            return false;
        }

        $className = 'peter\\WordPress\\ResponseFormatter';

        return (new $className)->responseFormat($response);
    }

    private function isJsonData($string) {

        $isString = is_string($string);
        $isArray = is_array(json_decode($string, true));
        $getJsonLastError = (json_last_error() == JSON_ERROR_NONE);

        return $isString && $isArray && $getJsonLastError ? true : false;
    }
}
