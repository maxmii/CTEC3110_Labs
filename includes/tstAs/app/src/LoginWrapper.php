<?php

/**
	* LoginWrapperhp
	*
	* create a wrapper for the SESSION global array
	*
	* Author: CF Ingrams
	* Email: <clinton@cfing.co.uk>
	* Date: 22/10/2017
	*
	*
	* @author CF Ingrams <clinton@cfing.co.uk>
	* @copyright CFI
	*
	*/

class LoginWrapper
{
	public function __construct() { }

	public function __destruct() {
	}

	public static function set_login($p_login_key, $p_login_value_to_set)
	{
		$m_login_value_set_successfully = false;
		if (!empty($p_login_value_to_set))
		{
			$_LOGIN[$p_login_key] = $p_login_value_to_set;
			if (strcmp($_LOGIN[$p_login_key], $p_login_value_to_set) == 0)
			{
				$m_login_value_set_successfully = true;
			}
		}
		return $m_login_value_set_successfully;
	}

	public static function get_login($p_login_key)
	{
		$m_login_value = false;

		if (isset($_LOGIN[$p_login_key]))
		{
			$m_login_value = $_SESSION[$p_login_key];
		}
		return $m_login_value;
	}

	public static function unset_login($p_login_key)
	{
		$m_unset_login = false;
		if (isset($_LOGIN[$p_login_key]))
		{
			unset($_SERVER[$p_login_key]);
		}
		if (!isset($_LOGIN[$p_login_key]))
		{
			$m_unset_login = true;
		}
		return $m_unset_login;
	}
}
