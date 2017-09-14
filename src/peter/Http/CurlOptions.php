<?php

namespace peter\Http;

class CurlOptions {

    // This is the default CURL options

    public static function getDefaultOptions() {

        return $options = [
            CURLOPT_RETURNTRANSFER => true,         // return web page
            CURLOPT_HEADER         => false,        // don't return headers
            CURLOPT_FOLLOWLOCATION => true,         // follow redirects
            CURLOPT_ENCODING       => '',           // handle all encodings
            CURLOPT_USERAGENT      => 'Mozilla',    // the user-agent
            CURLOPT_AUTOREFERER    => true,         // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,          // timeout on connect
            CURLOPT_TIMEOUT        => 120,          // timeout on response
            CURLOPT_MAXREDIRS      => 10,           // stop after 10 redirects
            CURLOPT_SSL_VERIFYHOST => 0,            // do verify ssl
            CURLOPT_SSL_VERIFYPEER => true,         //
            CURLOPT_VERBOSE        => 1,            //
            CURLOPT_COOKIEJAR      => '',           // the default cookie file path
            CURLOPT_HTTPHEADER     => [],           // set the HTTP headers
        ];
    }

    // Override the default CURL options

    public static function setOptions(array $newOptions) {
        $defaultOptions = $this->getDefaultOptions();
        foreach($newOptions as $theKey => $theValue) {
            $defaultOptions[$theKey] = $theValue;
        }

        return $defaultOptions;
    }
}
