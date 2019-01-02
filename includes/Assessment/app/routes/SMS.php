<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function(Request $request, Response $response)
{



    return $this->view->render($response,
        'sms_form.html.twig',
        [
            'title' => 'SMS Page',
            'css_path' => CSS_PATH,
            'initial_input_box_value' => null,
            'page_title' => 'SMS Page',
            'page_heading_1' => 'Send SMS',
            'page_heading_2' => 'Send a Text',
        ]);
})->setName('smspage');