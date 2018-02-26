<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Promise;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Pool;

$client = new Client();
$promises = [];
for ($i=0; $i < 10; ++$i ){
   $promise = $client->requestAsync('GET', 'http://localhost:3000/posts');
   $promise->then(
      function (ResponseInterface $res) {
        echo $res->getBody() . PHP_EOL;
  });
  $promises[] = $promise;
}

Promise\all($promises)->wait();



