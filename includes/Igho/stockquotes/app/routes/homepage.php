<?php
/**
 * homepage.php
 *
 * display the check primes application homepage
 *
 * allows the user to enter a value for testing if prime
 *
 * Author: CF Ingrams
 * Email: <cfi@dmu.ac.uk>
 * Date: 18/10/2015
 *
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function(Request $request, Response $response)
{
  $db_handle = $this->get('dbase');
  $sql_queries = $this->get('sql_queries');
  $wrapper_mysql = $this->get('mysql_wrapper');
  $companydetails_model = $this->get('companydetails_model');

  $company_names = $companydetails_model->getCompanyNames($db_handle, $sql_queries, $wrapper_mysql);

  return $this->view->render($response,
    'homepageform.html.twig',
    [
      'css_path' => CSS_PATH,
      'landing_page' => LANDING_PAGE,
      'method' => 'post',
      'action' => 'index.php/displaystockquotedetails',
      'initial_input_box_value' => null,
      'page_title' => APP_NAME,
      'page_heading_1' => APP_NAME,
      'page_heading_2' => 'Display details about a Company',
      'company_names' => $company_names,
      'submit_button_text' => SUBMIT_BUTTON,
      'page_text' => 'Select a company name, then select ' . SUBMIT_BUTTON,
    ]);
})->setName('homepage');
