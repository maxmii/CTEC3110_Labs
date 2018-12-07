<?php
/**
 * Created by PhpStorm.
 * User: p16223827
 * Date: 10/10/2018
 * Time: 10:40
 */

require 'vendor/autoload.php';
$app = new \Slim\App;
require 'routes.php';
$app->run();