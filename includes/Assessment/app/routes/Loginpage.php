<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function(Request $request, Response $response)
{

    $sid = session_id();


    return $this->view->render($response,
        'homepageform.html.twig',
        [
            'css_path' => CSS_PATH,
            'action' => 'index.php/storesessiondetails',
            'initial_input_box_value' => null,
            'page_title' => 'Login Page',
            'page_heading_1' => 'Login',
            'page_heading_2' => 'Please enter your login details',
            'page_heading_3' => 'Select the type of session storage to be used',
            'info_text' => 'Your information will be stored in either a session file or in a database',
            'sid_text' => 'Your super secret session SID is ',
            'sid' => $sid,
        ]);
})->setName('homepage');
