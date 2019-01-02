<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);


// check privilege
$app->add(function (Request $request, Response $response, $next) {
	$prefix = '/sms/index.php';
    $public_url = [
        $prefix . '/',
        $prefix . '/login',
        $prefix . '/api/login',
        $prefix . '/api/register',
    ];

    if(!strpos($request->getRequestTarget(), "index.php")) {
        return $response->withRedirect('/sms/index.php', 301);
    }
	
    if(!in_array($request->getRequestTarget(), $public_url) && empty($_SESSION['username'])) {
        return $response->withJson([
            'sc' => 500,
            'msg' => 'You have not enough privilege to visit this page!',
        ]);
    }

    $response = $next($request, $response);

    return $response;
});


// log
$app->add(function (Request $request, Response $response, $next) {
    $this->logger->info($request->getRequestTarget());
    return $next($request, $response);
});