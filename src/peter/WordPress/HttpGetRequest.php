<?php

/*
* This class implements HttpInterface to make the GET format strategy.
* This HttpGetRequest class is to do HTTP GET request vai WordPress HTTP API.
*/

namespace peter\WordPress;

class HttpGetRequest implements HttpRequestInterface {

    public function httpRequest(HttpRequest $request) {
        $args = $request->getArgs();
        $http = new \WP_Http();
        if(count($args) === 0) {
            $response = $http->request($request->getRequestUrl());
        } else {
            $response = $http->request($request->getRequestUrl(), $request->getArgs());
        }
        if(is_wp_error($request)) {
            return 'internal wp error';
        }

        return $response;
    }
}
