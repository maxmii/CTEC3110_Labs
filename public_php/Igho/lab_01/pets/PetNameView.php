<?php
/**
 * Created by PhpStorm.
 * User: p16223827
 * Date: 03/10/2018
 * Time: 16:46
 */

/** must be the FIRST declaration and is ONLY file wide */
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: slim
 * Date: 25/09/17
 * Time: 22:24
 */


class PetNameView
{
    private $output_html;
    public function createOutput($output_1, $output_2)
    {
        $this->output_html = <<< HTML
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Author" content="Clinton Ingrams" />
<title>Pets with Objects</title>
</head>
<body>
<h2>Pets with Objects</h2>
<p>$output_1</p>
<p>$output_2</p>
</body>
</html>
HTML;
    }
    public function getOutputHtml()
    {
        return $this->output_html;
    }
}