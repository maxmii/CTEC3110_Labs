<?php
/**
 * Created by PhpStorm.
 * User: slim
 * Date: 24/10/17
 * Time: 10:01
 */

class CompanyDetailsModel
{
  public function __construct(){}

  public function __destruct(){}

  public function getCompanyNames($db_handle, $sql_queries, $wrapper_mysql)
  {
    $company_symbols = [];
    $query_string = $sql_queries->getAllCompanySymbols();

    $wrapper_mysql->setDbHandle($db_handle);
    $wrapper_mysql->safeQuery($query_string);

    $number_of_companies = $wrapper_mysql->countRows();

    if ($number_of_companies > 0)
    {
      while ($row = $wrapper_mysql->safeFetchArray())
      {
        $company_symbol = $row['stock_company_symbol'];
        $company_name = $row['stock_company_name'];
        $company_symbols[$company_symbol] = $company_name . ' (' . $company_symbol . ')';
      }
    }
    else
    {
      $company_symbols[0] = 'No companies found';
    }

    return $company_symbols;
  }

  public function validateCompanySymbol($validator, $tainted_company_symbol)
  {
    $validated_company = 'None selected';
    if (!empty($tainted_company_symbol))
    {
      $validated_company = $validator->validateCompany($tainted_company_symbol);
    }
    return $validated_company;
  }

  public function getCompanyDetails($db_handle, $sql_queries, $wrapper_mysql, $validated_company)
  {
    $company_details = [];
    $sql_query_string = $sql_queries->getCompanyStockData();
    $arr_sql_query_parameters = array(':stock_company_symbol' => $validated_company);
    $wrapper_mysql->setDbHandle($db_handle);
    $wrapper_mysql->safeQuery($sql_query_string, $arr_sql_query_parameters);

    $number_of_data_sets = $wrapper_mysql->countRows();

    if ($number_of_data_sets > 0)
    {
      $lcv = 0;
      while ($row = $wrapper_mysql->safeFetchArray())
      {
        $stock_company_name = $row['stock_company_name'];
        $company_stock_values_list[$lcv]['date'] = $row['stock_date'];
        $company_stock_values_list[$lcv]['time'] = $row['stock_time'];
        $company_stock_values_list[$lcv++]['value'] = $row['stock_last_value'];
      }
    }
    else
    {
      $company_details[0] = 'No company details found';
    }

    $company_details['company-symbol'] = $validated_company;
    $company_details['company-name'] = $stock_company_name;
    $company_details['company-data-sets'] = $number_of_data_sets;
    $company_details['company-retrieved-data'] = $company_stock_values_list;

    return $company_details;
  }

  public function createChart($companydetailschart_model, $company_details)
  {
    require_once 'libchart/classes/libchart.php';

    $companydetailschart_model->setStoredCompanyStockData($company_details);
    $companydetailschart_model->createLineChart();
    $chart_details = $companydetailschart_model->getLineChartDetails();

    return $chart_details;
  }
}