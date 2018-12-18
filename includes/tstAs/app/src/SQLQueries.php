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

  public static function check_login_var()
  {
    $m_query_string  = "SELECT log_var_name ";
    $m_query_string .= "FROM login ";
    $m_query_string .= "WHERE login_id = :local_login_id ";
    $m_query_string .= "AND login_var_name = :login_var_name ";
    $m_query_string .= "LIMIT 1";
    return $m_query_string;
  }

  public static function create_login_var()
	{
		$m_query_string  = "INSERT INTO login ";
		$m_query_string .= "SET login_id = :local_login_id, ";
		$m_query_string .= "login_var_name = :login_var_name, ";
		$m_query_string .= "login_value = :login_var_value ";
		return $m_query_string;
	}

	public static function set_login_var()
	{
		$m_query_string  = "UPDATE login ";
		$m_query_string .= "SET login_value = :login_var_value ";
		$m_query_string .= "WHERE login_id = :local_login_id ";
		$m_query_string .= "AND login_var_name = :login_var_name";
		return $m_query_string;
	}

	public static function get_login_var()
	{
		$m_query_string  = "SELECT login_value ";
		$m_query_string .= "FROM login ";
		$m_query_string .= "WHERE login_id = :local_login_id ";
		$m_query_string .= "AND login_var_name = :login_var_name";
		return $m_query_string;
	}
}
