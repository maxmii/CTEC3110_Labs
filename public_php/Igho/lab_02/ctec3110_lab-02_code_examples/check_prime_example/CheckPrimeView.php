<?php
class CheckPrimeView
{
	private $c_arr_page_content;
	private $c_check_prime_result_message;
	private $c_html_page;

	public function __construct()
	{
		$this->c_page_content = '';
		$this->c_arr_page_content = array();
	}

	public function __destruct() {}

	public function set_output_values($p_arr_page_content)
	{
		$this->c_arr_page_content = $p_arr_page_content;
	}

	private function get_result_message()
	{
		$m_check_prime_result_message = '';
		if ($this->c_arr_page_content['error_message'])
		{
			$m_check_prime_result_message .= 'Ooops - there was a problem with the number you entered';
		}
		else
		{
			$m_guess_value = $this->c_arr_page_content['cleaned_guess'];
			$m_check_prime_result_message .= 'You entered ' . $m_guess_value . ' to be tested for prime-ness<br />';

			if ($this->c_arr_page_content['prime_check_result'])
			{
				$m_check_prime_result_message .= 'The number you entered is a prime number';
			}
			else
			{
				$m_check_prime_result_message .= 'The number you entered is not a prime number';
			}
		}
		$this->c_check_prime_result_message = $m_check_prime_result_message;
	}

	public function create_output_page()
	{
		$this->get_result_message();
		$m_homepage_address = $_SERVER["REQUEST_URI"];

		$m_page_title = 'And the result is...';
		$m_page_heading = 'Prime Numbers';
		$m_check_prime_result_message = $this->c_check_prime_result_message;

		$m_html_output = <<< HTMLOUTPUT
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>$m_page_title</title>
</head>
<body>
	<h2>$m_page_heading</h2>
	<p>$m_check_prime_result_message</p>
	<p><a href="$m_homepage_address">Try again</a></p>
</body>
</html>
HTMLOUTPUT;
		$this->c_html_page = $m_html_output;
	}

	// returns the completed html page
	public function get_output_html()
	{
		return $this->c_html_page;
	}
}
?>
