<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Promise;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Pool;

$client = new Client();
$request = new Request('GET', 'http://localhost:3000/posts');
for ($i=0; $i < 10; ++$i ){
   $response = $client->send($request);
   echo $response->getBody() . PHP_EOL;
}






