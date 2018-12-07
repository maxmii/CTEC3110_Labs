<?php
/**
 * Created by PhpStorm.
 * User: p16223827
 * Date: 10/10/2018
 * Time: 10:45
 */


$app->get('/', function()
{
    $m_homepage_html = <<< HOMEPAGE
<!DOCTYPE html>
<html lang=”en">
<head>
<meta http-equiv="Content-Type" content="text/html;
charset=utf-8" />
<title>Test integer for Prime-ness</title>
</head>
<body>
<form method="post" action="index.php">
<h2>Is your number prime?</h2>
<label for="guess">What is your number?</label>
<input id="guess" name="guess_prime" type="text" />
<br /><br />
<input type="submit" value="Click here to see if it is
Prime" />
    
    </form>
</body>
</html>
HOMEPAGE;
    echo $m_homepage_html;
});