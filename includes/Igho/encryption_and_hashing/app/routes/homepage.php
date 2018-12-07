<?php
/**
 * homepage.php
 *
 * display the check primes application homepage
 *
 * allows the user to enter a value for testing if prime
 *
 * Author: CF Ingrams
 * Email: <clinton@cfing.co.uk>
 * Date: 18/10/2015
 *
 * @author CF Ingrams <clinton@cfing.co.uk>
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function(Request $request, Response $response)
{

  $sid = session_id();

  return $this->view->render($response,
    'homepageform.html.twig',
    [
      'css_path' => CSS_PATH,
      'landing_page' => LANDING_PAGE,
      'action' => 'index.php/registeruser',
      'initial_input_box_value' => null,
      'page_title' => APP_NAME,
      'page_heading_1' => APP_NAME,
      'page_heading_2' => 'New User Registration',
    ]);
})->setName('homepage');