<?php
/** a view class
	* takes generated content and embeds it within HTML script
	*/

class View
{
	private $c_output_html;
	private $c_input_content;
	private $c_page_title;

	public function __construct() {}
	public function __destruct() {}

	/**
		* set the title of the web-page
		*/
	public function set_page_title($p_page_title)
	{
		$this->c_page_title = $p_page_title;
	}

	/**
		* set the generated content
		*/
	public function set_page_content($p_page_content)
	{
		$this->c_input_content = $p_page_content;
	}

	/**
		* The output is passed as an array, so need to read the
		* array elements into local variables, before embedding
		* the generated content into the html
		*/
	private function create_html_page()
	{
		$m_output_1 = $this->c_input_content[1];
		$m_output_2 = $this->c_input_content[2];

		$this->c_output_html = <<< HTML
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>$this->c_page_title</title>
</head>
<body>
	<h1>Testing the Person class</h1>
	<p>$m_output_1</p>
	<p>$m_output_2</p>
</body>
</html>
HTML;
	}

	/**
		* Return the completed HTML web-page
		* This cheats a bit and actually generates the html!
		*/
	public function get_output_html()
	{
		$this->create_html_page();
		return $this->c_output_html;
	}
}
?>
