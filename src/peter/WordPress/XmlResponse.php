<?php

/*
* This class helps you processing the response type is JSON data.
*/

namespace peter\WordPress;

class XmlResponse implements HttpResponseInterface {

    public function httpResponse(HttpResponse $response) {

        if(!$this->isXmlData($response['body'])) {
            return false;
        }

        $className = 'peter\\WordPress\\ResponseFormatter';

        return (new $className)->responseFormat($response);
    }

    private function isXmlData($string) {

        $dom = new DOMDocument;
        $dom->loadXML($string);

        return $dom->validate() ? true : false;
    }
}
