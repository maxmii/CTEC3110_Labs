<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once 'PetName.php';
require_once 'PetNameView.php';
require 'vendor/autoload.php';

$app = new \Slim\App;

$app->get('/', 'do_nonames');

$app->get('/{name1}', function (Request $request, Response $response)
{
  $name1 = $request->getAttribute('name1');

  $message = do_onename($name1);

  return $response->write($message);
});

$app->get('/{name1}/{name2}', function (Request $request, Response $response, $args)
{
  $name1 = $request->getAttribute('name1');
  $name2 = $args['name2'];

  $message = do_pets($name1, $name2);

  return $response->write($message);
});

$app->run();

function do_nonames()
{
  echo "Coursework Homepage";
}

function do_onename($name1)
{
  echo "error - only one pet name, $name1, was entered";
}

function do_pets($name1, $name2)
{
  $output1 = '';
  $output2 = '';
  $output_html = '';

  //create a new object
  $obj_my_pet = new PetName();

  //assign a value to the petname attribute in the object
  $obj_my_pet->set_pet_name($name1);

  //retrieve the pet's name from the object's attribute
  $my_pet_name = $obj_my_pet->get_pet_name();

  $output1 = 'Pet\'s name is ' . $my_pet_name;

  //assign a new value to the the petname attribute in the object
  $obj_my_pet->set_pet_name($name2);

  //retrieve the pet's name from the object's attribute
  $my_pet_name = $obj_my_pet->get_pet_name();
  $output2 = 'New pet\'s name is ' . $my_pet_name;

  // create a view object and pass the output strings to the view object
  $obj_pets_view = new PetNameView();
  $obj_pets_view->create_output($output1, $output2);
  $output_html = $obj_pets_view->get_output_html();

return $output_html;
}
