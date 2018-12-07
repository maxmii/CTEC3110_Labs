<?php
/**
 * Created by PhpStorm.
 * User: cfi
 * Date: 20/11/15
 * Time: 14:01
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->post(
  '/displaystockquotedetails',
  function(Request $request, Response $response) use ($app)
  {
    $validated_country = false;
    $validated_detail = false;
    $country_detail_result = false;

    $arr_tainted_params = $request->getParsedBody();
    $validator = $this->get('validator');
    $db_handle = $this->get('dbase');
    $sql_queries = $this->get('sql_queries');
    $wrapper_mysql = $this->get('mysql_wrapper');
    $companydetails_model = $this->get('companydetails_model');
    $companydetailschart_model = $this->get('companydetailschart_model');

    $validated_company = $companydetails_model->validateCompanySymbol($validator, $arr_tainted_params['company']);
    $company_details = $companydetails_model->getCompanyDetails(
      $db_handle,
      $sql_queries,
      $wrapper_mysql,
      $validated_company
    );

    $chart_location = $companydetails_model->createChart($companydetailschart_model, $company_details);
    $company_name = $company_details['company-name'];
    $company_data_set = $company_details['company-retrieved-data'];

    return $this->view->render($response,
      'display_result.html.twig',
      [
        'css_path' => CSS_PATH,
        'landing_page' => LANDING_PAGE,
        'initial_input_box_value' => null,
        'page_title' => APP_NAME,
        'page_heading_1' => APP_NAME,
        'page_heading_2' => 'Result',
        'company_data_set' => $company_data_set,
        'chart_location' => $chart_location,
        'company_name' => $company_name,
      ]);
  });
