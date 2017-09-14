<?php

/*
* This the main PHP is to present the HTTP Request/Response example.
*/

// show the runtime error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__.'/src/autoloader.php';

use peter\Http\HttpRequest;
use peter\Http\HttpResponse;

// read the api-key.ini to get the required API keys.
if(!file_exists('./api-key.ini')) {
    die('You need to create the api-key.ini file!'.PHP_EOL);
}

$apiKey = parse_ini_file('./api-key.ini', true);
$accessToken = $apiKey['Facebook']['access_token'];
$rebrandlyKey = $apiKey['Rebrandly']['api_key'];

$pageId = '167874227121383';
$formatString = 'https://graph.facebook.com/%s/feed?fields=%s&access_token=%s';
$fileldLists = [
    'full_picture',
    'created_time',
    'message',
    'likes',
    'object_id',
];
$filelds = implode($fileldLists, ',');

// HTTP GET example (HTTP GET Facebook page id)
$requestUrl = sprintf($formatString, $pageId, $filelds, $accessToken);

// This is the default CURL options and you can override the options as you want.
$options = [
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

$request = new HttpRequest($requestUrl, 'GET', $options);
$responseList = $request->httpRequest();

$response = new HttpResponse($responseList);
$result = json_decode($response->httpResponse(), true);
var_dump($result);

// HTTP POST example (POST the url to the shorten url via rebrandly service)
/*
$requestUrl = 'https://api.rebrandly.com/v1/links';
$domainData['fullName'] = 'rebrand.ly';
$postData['destination'] = 'https://www.messenger.com';
$postData['domain'] = $domainData;
$request->setHttpMethod('POST');
$request->setRequestUrl($requestUrl);
$args = [
    'headers' => [
        'apikey: '.$rebrandlyKey,
        'Content-Type: application/json',
    ],
    'body' => json_encode($postData),
];
$request->setArgs($args);
$responseList = $request->httpRequest();
$response = new HttpResponse($responseList);
$result = json_decode($response->httpResponse(), true);
var_dump($result);
*/
