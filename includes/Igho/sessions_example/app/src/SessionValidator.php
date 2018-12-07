<?php

class SessionValidator
{
	public function __construct() { }

	public function __destruct() { }

	public function sanitise_string($p_string_to_sanitise)
	{
		$m_sanitised_string = false;

		if (!empty($p_string_to_sanitise))
		{
			$m_sanitised_string = filter_var($p_string_to_sanitise, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		}
		return $m_sanitised_string;
	}

	public function validate_integer($p_value_to_check)
	{
		$m_checked_value = false;
		$options = array(
			'options' => array(
				'default' => -1, // value to return if the filter fails
				'min_range' => 0
			)
		);

		if (isset($p_value_to_check))
		{
			$m_checked_value = filter_var($p_value_to_check, FILTER_VALIDATE_INT, $options);
		}

		return $m_checked_value;
	}

	public function validate_server_type($p_type_to_check)
	{
		$m_checked_server_type = false;
		$m_arr_calculation_type = array('file', 'database');

		if (in_array($p_type_to_check, $m_arr_calculation_type))
		{
			$m_checked_server_type = $p_type_to_check;
		}

		return $m_checked_server_type;
	}
}