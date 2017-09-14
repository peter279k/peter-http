<?php

/*
* This class helps you processing the response type is html data.
*/

namespace peter\Http;

class HtmlResponse implements HttpResponseInterface {

    public function httpResponse(HttpResponse $response) {

        if(!$this->isHtmlData($response['body'])) {
            return false;
        }

        $className = 'peter\\Http\\ResponseFormatter';

        return (new $className)->responseFormat($response);
    }

    private function isHtmlData($string) {
        return $string != strip_tags($string) ? true:false;
    }
}
