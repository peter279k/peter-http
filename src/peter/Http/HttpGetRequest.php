<?php

/*
* This class implements HttpInterface to make the GET format strategy.
* This HttpGetRequest class is to do HTTP GET request vai WordPress HTTP API.
*/

namespace peter\Http;

class HttpGetRequest implements HttpRequestInterface {

    public function httpRequest(HttpRequest $request) {

        $response = curl_exec($request->curl);

        if(!$response) {
            return curl_error($request->curl);
        }

        return $response;
    }
}
