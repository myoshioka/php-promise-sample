<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Promise;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Pool;

$client = new Client();

$requests = function(){
    $list  = [];  
    for ($i=0; $i < 10; ++$i ){
        echo 'hoge' . $i . PHP_EOL;
        $list[] =  new Request("GET", "http://localhost:3000/posts");
    }
    return $list;
};

$requestsYield = function(){
    for ($i=0; $i < 10; ++$i ){
        echo 'hoge' . $i . PHP_EOL;
        yield new Request("GET", "http://localhost:3000/posts");
    }
};

foreach($requests() as $request){
 $response = $client->send($request);
 echo $response->getBody();
}

foreach($requestsYield() as $request){
 $response = $client->send($request);
 echo $response->getBody();
}


