<?php
/**
 * Created by PhpStorm.
 * User: p16223827
 * Date: 10/10/2018
 * Time: 10:42
 */


require 'CheckPrimeValidate.php';
require 'CheckPrimeModel.php';
require 'CheckPrimeView.php';
$app->post('/', function()
{
    $arr_page_content = array();
    $obj_check_prime_validate = new CheckPrimeValidate();
    $obj_check_prime_validate->sanitise_input();
    $arr_validate_result = $obj_check_prime_validate->get_validated_prime_check();
$arr_page_content['error_message'] = false;
if ($arr_validate_result['check_prime_error'])
{
    $arr_page_content['error_message'] = true;
}
else
{
    $arr_page_content['cleaned_guess'] =
        $arr_validate_result['check_prime_validated'];
    $obj_check_prime = new CheckPrimeModel();
    $obj_check_prime->set_prime_check_value($arr_page_content['cleaned_guess']);
$obj_check_prime->do_prime_check();
$arr_page_content['prime_check_result'] = $obj_check_prime->get_prime_check_result();
}
$obj_view_result_page = new CheckPrimeView();
$obj_view_result_page->set_output_values($arr_page_content);
$obj_view_result_page->create_output_page();
$html = $obj_view_result_page->get_output_html();
echo $html;
});