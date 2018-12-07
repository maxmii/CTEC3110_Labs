<?php
/**
	* displaysessiondetails.php
	*
	* retrieve the session details from either the session file or the database
	*
	* produces a result according to the user entered values and calculation type
	*
	* Author: CF Ingrams
	* Email: <clinton@cfing.co.uk>
	* Date: 22/10/2015
	*
	* @author CF Ingrams <clinton@cfing.co.uk>
	*/
use Slim\Http\Request;
use Slim\Http\Response;

$app->post('/displaysessiondetails',
    function(Request $request, Response $response) use ($app)
    {
        $session_wrapper = $this->get('session_wrapper');

        $username = $session_wrapper->get_session('user_name');
        $password = $session_wrapper->get_session('password');

        echo "Username: $username<br>";
        echo "Password: $password<br>";

        echo"<pre>";
        print_r($_SESSION);

        echo"</pre>";



    });


