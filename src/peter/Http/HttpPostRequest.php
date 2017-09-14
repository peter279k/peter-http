<?php

/*
* This class implements HttpInterface to make the GET format strategy.
* This HttpPostRequest class is to do HTTP GET request vai WordPress HTTP API.
*/

namespace peter\Http;

class HttpPostRequest implements HttpRequestInterface {

    public function httpMethodFormat(HttpRequest $request) {

        $args = $request->getArgs();
        if(array_key_exists('body', $args)) {
            return 'empty body';
        }

        $response = wp_remote_post($request->getRequestUrl(), $args);
        if(is_wp_error($request)) {
            return 'internal wp error';
        }

        return $response;
    }
}
