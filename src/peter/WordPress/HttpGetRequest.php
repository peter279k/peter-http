<?php

/*
* This class implements HttpInterface to make the GET format strategy.
* This HttpGetRequest class is to do HTTP GET request vai WordPress HTTP API.
*/

namespace peter\WordPress;

class HttpGetRequest implements HttpRequestInterface {

    public function httpRequest(HttpRequest $request) {
        $args = $request->getArgs();
        if(count($args) === 0) {
            $response = wp_remote_get($request->getRequestUrl());
        } else {
            $response = wp_remote_get($request->getRequestUrl(), $args);
        }
        if(is_wp_error($request)) {
            return 'internal wp error';
        }

        return $response;
    }
}
