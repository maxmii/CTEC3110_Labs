<?php

class PetNameView
{
  private $c_output_html;

  public function create_output($p_output1, $p_output2)
  {
    $this->c_output_html = <<< HTML
<!DOCTYPE html>
<html lang="gb">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="Author" content="Clinton Ingrams" />
	<title>Pets with Objects</title>
</head>
<body>
	<h2>Pets with Objects</h2>
	<p>$p_output1</p>
	<p>$p_output2</p>
</body>
</html>
HTML;
  }

  public function get_output_html()
  {
    return $this->c_output_html;
  }
}
