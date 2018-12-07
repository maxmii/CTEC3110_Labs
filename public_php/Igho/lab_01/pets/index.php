<?php
/**
 * Created by PhpStorm.
 * User: p16223827
 * Date: 03/10/2018
 * Time: 16:34
 */

/** must be the FIRST declaration and is ONLY file wide */
declare(strict_types=1);
/* not used in this example
* use \Psr\Http\Message\ServerRequestInterface as Request;
* use \Psr\Http\Message\ResponseInterface as Response;
*/

require_once 'PetName.php';
require_once 'PetNameView.php';
require 'vendor/autoload.php';
$app = new \Slim\App;
$app->get('/','doPets');
$app->run();
function doPets()
{
    $pet_1_name = '';
    $pet_2_name = '';
//create a new object
    $my_pet = new PetName();
//assign a value to the petName attribute in the object
    $my_pet->setPetName('Freddy');

//retrieve the pet's name from the object's attribute
    $pet_name = $my_pet->getPetName();
    $pet_1_name = 'Pet\'s name is ' . $pet_name;
//assign a new value to the the petName attribute in the object
    $my_pet->setPetName('Gums');
//retrieve the pet's name from the object's attribute
    $pet_name = $my_pet->getPetName();
    $pet_2_name = 'New pet\'s name is ' . $pet_name;

    // create a view object and pass the output strings to the view object
    $pets_view = new PetNameView();
    $pets_view->createOutput($pet_1_name, $pet_2_name);
    $output_html = $pets_view->getOutputHtml();
    echo $output_html;
}
