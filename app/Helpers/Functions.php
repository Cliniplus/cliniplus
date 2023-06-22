<?php
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

function getRequest($url){
    $apiURL = $url;      
    $token = Session()->get('user');
    if($token){
    $token = Session()->get('user')['token'];
    }
    $headers = [
        'Authorization' => 'Bearer ' . $token,
        'Accept' => 'application/json',
    ];
    $client = new \GuzzleHttp\Client();
    try{
        $response = $client->request('GET', $apiURL,['headers' => $headers]);
    }catch(Exception $e){
        return [];
    }

    $statusCode = $response->getStatusCode();
    $responseBody = json_decode($response->getBody(), true);
    if ($statusCode == 200) {
        if($responseBody['isSuccess']){
            return $responseBody['data'];
        }   
    } else {
        return [];
    } 
}

