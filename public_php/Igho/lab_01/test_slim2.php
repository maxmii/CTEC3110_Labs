<?php
/**
 * Created by PhpStorm.
 * User: p16223827
 * Date: 03/10/2018
 * Time: 12:43
 */

/**
use \Psr\Http\Message\ServerRequestInterface as Request;
require 'vendor/autoload.php';
$app = new \Slim\App;
$app->get('/sayhi','sayhi');
$app->get('/sayhi2u/{name}', function (Request $request)
{
    $name = $request->getAttribute('name');
    sayhi2u($name);
});
$app->run();
function sayhi(){
    echo 'hello world';
}
function sayhi2u($name){
    echo 'Hi '. $name;
}
*/


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require 'vendor/autoload.php';
$app = new \Slim\App;
$app->get('/sayhi','sayhi');
$app->get('/sayhi2u/{name}', function (Request $request, Response $response)
{
    $name = $request->getAttribute('name');
    $message = sayhi2u($name);
    return $response->write($message);
});
$app->run();
function sayhi(){
    echo 'hello world';
}
function sayhi2u($name){
    return 'Hi '. $name;
}
