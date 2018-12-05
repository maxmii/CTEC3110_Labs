<?php
/**
 * Created by PhpStorm.
 * User: slim
 * Date: 12/10/17
 * Time: 17:04
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$settings = require  'Assessment/app/settings.php';

$container = new \Slim\Container($settings);

require 'Assessment/app/dependencies.php';

$app = new \Slim\App($container);

require 'Assessment/app/routes.php';

$app->run();
