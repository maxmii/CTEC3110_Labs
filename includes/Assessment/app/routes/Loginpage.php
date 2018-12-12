<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function(Request $request, Response $response)
{

    $sid = session_id();


    return $this->view->render($response, 'homepageform.html.twig',
        [
            'css_path' => 'css/main.css',
            'action' => 'index.php/storelogindetails',
            'page_title' => 'Login Page',
            'page_heading_1'=> 'Login',
            'page_heading_2' => 'Login',
            'page_heading_3' => 'Please enter your username and password',
            'sid_text' => 'Your super secret session SID is',
            'sid' => $sid,
        ]);
})->setName('homepage');
