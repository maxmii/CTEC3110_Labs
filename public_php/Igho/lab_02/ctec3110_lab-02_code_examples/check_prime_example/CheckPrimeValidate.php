<?php
/** sanitise and validate the entered number
	*/
class CheckPrimeValidate
{
	private $c_arr_tainted;
	private $c_arr_cleaned;

	public function __construct()
	{
		$this->c_arr_tainted = array();
		$this->c_arr_cleaned = array();
	}

	public function __destruct() {}

	public function sanitise_input()
	{
		$this->c_arr_tainted = $_POST;
		$this->c_arr_cleaned['check_prime_error'] = false;

		$m_guess = $this->c_arr_tainted['guess_prime'];
		$m_sanitised_guess = filter_var($m_guess, FILTER_SANITIZE_STRING);
		if (empty($m_sanitised_guess) || !is_numeric($m_sanitised_guess) || $m_sanitised_guess <= 1)
		{
			$this->c_arr_cleaned['check_prime_error'] = true;
		}
		else
		{
			$this->c_arr_cleaned['check_prime_validated'] = $m_sanitised_guess;
		}
	}

	public function get_validated_prime_check()
	{
		return $this->c_arr_cleaned;
	}
}
?>