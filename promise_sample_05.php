<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Promise;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Pool;

$client = new Client();

$requests = function(){
  for ($i=0; $i < 10; ++$i ){
   yield new Request("GET", "http://localhost:3000/posts");
  }
};

$pool = new Pool($client, $requests(), [
    'concurrency' => 2,
    'fulfilled' => function ($response, $index) {
         echo $response->getBody();
    },
    'rejected' => function ($reason, $index) {
    },
]);

$promise = $pool->promise();
$promise->wait();




