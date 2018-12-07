<?php
/**
 * Created by PhpStorm.
 * User: p16223827
 * Date: 03/10/2018
 * Time: 10:33
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
// you may need to adapt the path to the vendor directory with one or more‘../’
require 'vendor/autoload.php';
$app = new \Slim\App;
$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");
    return $response;
});
$app->run();