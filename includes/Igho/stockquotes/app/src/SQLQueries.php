<?php

/**
 * SQLQueries.php
 *
 * hosts all SQL queries to be used by the Model
 *
 * Author: CF Ingrams
 * Email: <clinton@cfing.co.uk>
 * Date: 22/10/2017
 *
 * @author CF Ingrams <clinton@cfing.co.uk>
 * @copyright CFI
 */

class SQLQueries
{
  public function __construct() { }

  public function __destruct() { }

  public static function getAllCompanySymbols()
  {
    $sql_query_string  = "SELECT stock_company_symbol, stock_company_name ";
    $sql_query_string .= "FROM company_name ";
    $sql_query_string .= "ORDER BY stock_company_name";
    return $sql_query_string;
  }

  public static function getCompanyStockData()
  {
    $sql_query_string  = "SELECT stock_last_value, stock_date, stock_time, stock_company_name ";
    $sql_query_string .= "FROM company_name, stock_data ";
    $sql_query_string .= "WHERE company_name.stock_company_symbol = :stock_company_symbol ";
    $sql_query_string .= "AND company_name.stock_company_name_id = stock_data.fk_company_stock_id ";
    $sql_query_string .= "ORDER BY stock_date";
    return $sql_query_string;
  }
}
