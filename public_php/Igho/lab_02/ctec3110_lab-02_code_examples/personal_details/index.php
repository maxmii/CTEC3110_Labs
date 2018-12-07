<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once 'Person.php';
require_once 'View.php';
require 'vendor/autoload.php';

$app = new \Slim\App;

$app->get('/','do_person');
$app->run();
function do_noperson()
{
    echo "error - no names were entered";
}

function do_onePerson($person1)
{
    echo "error - only one name, $person1, was entered";
}



function do_person()
{
	$arr_output = array();

	$obj_person = new Person();
	$obj_person->name = 'Bill';
	$obj_person->date_of_birth = '11 August 1948';
	$arr_output[1] = $obj_person->say_hello();

// this should trigger an error
	$obj_person2 = new Person();
	$obj_person2->name = 'Fred';
//	$obj_person2->date_of_birth = '11 June 1989';
	$obj_person2->date_of_birth = '11 June 1989';
	$arr_output[2] = $obj_person2->say_hello();

	$obj_view = new View();
	$obj_view->set_page_title('Person Class Demonstration');
	$obj_view->set_page_content($arr_output);
	$output_html = $obj_view->get_output_html();
	echo $output_html;
}


