<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function(Request $request, Response $response)
{

    $sid = session_id();


    return $this->view->render($response, 'homepageform.html.twig',
        [
            'css_path' => 'css\main.css',
            'page_title' => 'LoPage',
            'page_heading_2' => 'Home',
            'page_heading_3' => 'Please enter your username and password',
            'sid_text' => 'Your super secret session SID is',
            'sid' => $sid,
        ]);
})->setName('homepage');
