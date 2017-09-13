<?php

/*
* This the main PHP is to present the HTTP Request/Response example.
*/

// show the runtime error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__.'/src/autoloader.php';

use peter\WordPress\HttpRequest;
use peter\WordPress\HttpResponse;

// read the api-key.ini to get the required API keys.
if(!file_exists('./api-key.ini')) {
    die('You need to create the api-key.ini file!');
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
$request = new HttpRequest($requestUrl, 'GET');
$responseList = $request->httpRequest();
$response = new HttpResponse($responseList);
$result = json_decode($response->httpResponse(), true);
var_dump($result);

// HTTP POST example (POST the url to the shorten url via rebrandly service)

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
