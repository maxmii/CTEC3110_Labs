<?php
/**
 * registeruser.php
 *
 * calculate the result
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

$app->post(
    '/registeruser',
    function(Request $request, Response $response) use ($app)
    {

        $arr_tainted_params = $request->getParsedBody();

        $validator = $this->get('validator');

        $arr_cleaned_params = validation($validator, $arr_tainted_params);

        if ($arr_cleaned_params['sanitised_email'] === false) {
            //return an error here?
            return $this->view->render($response,
                'homepageform.html.twig',
                [
                    'css_path' => CSS_PATH,
                    'landing_page' => LANDING_PAGE,
                    'action' => '/lab_07/encryption_and_hashing_public/index.php/registeruser',
                    'initial_input_box_value' => null,
                    'page_title' => APP_NAME,
                    'page_heading_1' => APP_NAME,
                    'page_heading_2' => 'New User Registration',
                    'error_message_email' => "Invalid email!",
                ]);
        }elseif($arr_cleaned_params['sanitised_username'] === false)
        {   //return an error
            return $this->view->render($response,
                'homepageform.html.twig',
                [
                    'css_path' => CSS_PATH,
                    'landing_page' => LANDING_PAGE,
                    'action' => '/lab_07/encryption_and_hashing_public/index.php/registeruser',
                    'initial_input_box_value' => null,
                    'page_title' => APP_NAME,
                    'page_heading_1' => APP_NAME,
                    'page_heading_2' => 'New User Registration',
                    'error_message_username' => "Invalid Username!",
                ]);
        }elseif($arr_cleaned_params['sanitised_requirements'] === false){
            return $this->view->render($response,
                'homepageform.html.twig',
                [
                    'css_path' => CSS_PATH,
                    'landing_page' => LANDING_PAGE,
                    'action' => 'index.php',
                    'initial_input_box_value' => null,
                    'page_title' => APP_NAME,
                    'page_heading_1' => APP_NAME,
                    'page_heading_2' => 'New User Registration',
                    'error_message' => "Invalid details!",
                ]);
        }

        $libsodium_wrapper = $this->get('libsodium_wrapper');
        $bcrypt_wrapper = $this->get('bcrypt_wrapper');
        $base64_wrapper = $this->get('base64_wrapper');

        $arr_encrypted = encrypt($libsodium_wrapper, $arr_cleaned_params);
        $arr_hashed = hash_values($bcrypt_wrapper, $arr_cleaned_params);
        $arr_encoded = encode($base64_wrapper, $arr_encrypted);
        $arr_decrypted = decrypt($libsodium_wrapper, $base64_wrapper, $arr_encoded);

        $libsodium_version = SODIUM_LIBRARY_VERSION;

        return $this->view->render($response,
            'register_user_result.html.twig',
            [
                'landing_page' => $_SERVER["SCRIPT_NAME"],
                'css_path' => CSS_PATH,
                'page_title' => APP_NAME,
                'page_heading_1' => 'New User Registration',
                'page_heading_2' => 'New User Registration',
                'username' => $arr_tainted_params['username'],
                'password' => $arr_tainted_params['password'],
                'email' => $arr_tainted_params['email'],
                'requirements' => $arr_tainted_params['requirements'],
                'sanitised_username' => $arr_cleaned_params['sanitised_username'],
                'cleaned_password' => $arr_cleaned_params['password'],
                'sanitised_email' => $arr_cleaned_params['sanitised_email'],
                'sanitised_requirements' => $arr_cleaned_params['sanitised_requirements'],
                'hashed_password' => $arr_hashed['hashed_password'],
                'libsodium_version' => $libsodium_version,
                'nonce_value_username' => $arr_encrypted['encrypted_username_and_nonce']['nonce'],
                'encrypted_username' => $arr_encrypted['encrypted_username_and_nonce']['encrypted_string'],
                'nonce_value_email' => $arr_encrypted['encrypted_username_and_nonce']['nonce'],
                'encrypted_email' => $arr_encrypted['encrypted_email_and_nonce']['encrypted_string'],
                'nonce_value_dietary_requirements' => $arr_encrypted['encrypted_username_and_nonce']['nonce'],
                'encrypted_requirements' => $arr_encrypted['encrypted_dietary_requirements_and_nonce']['encrypted_string'],
                'encoded_username' => $arr_encoded['encoded_username'],
                'encoded_email' => $arr_encoded['encoded_email'],
                'encoded_requirements' => $arr_encoded['encoded_requirements'],
                'decrypted_username' => $arr_decrypted['username'],
                'decrypted_email' => $arr_decrypted['email'],
                'decrypted_dietary_requirements' => $arr_decrypted['dietary_requirements'],
            ]);

    });

function validation($validator, $arr_tainted_params)
{
    $arr_cleaned_params = [];
    $tainted_username = $arr_tainted_params['username'];
    $tainted_email = $arr_tainted_params['email'];
    $tainted_requirements = $arr_tainted_params['requirements'];

    $arr_cleaned_params['password'] = $arr_tainted_params['password'];
    //sanitize it
    $arr_cleaned_params['sanitised_username'] = $validator->sanitise_string($tainted_username);
    $arr_cleaned_params['sanitised_email'] = $validator->sanitise_email($tainted_email);
    $arr_cleaned_params['sanitised_requirements'] = $validator->sanitise_string($tainted_requirements);

    //check no special chars
    $arr_cleaned_params['sanitised_username'] = $validator->no_special_char($arr_cleaned_params['sanitised_username']);




    return $arr_cleaned_params;
}

function encrypt($libsodium_wrapper, $cleaned_parameters)
{
    $arr_encrypted = [];
    $arr_encrypted['encrypted_username_and_nonce'] = $libsodium_wrapper->encrypt($cleaned_parameters['sanitised_username']);
    $arr_encrypted['encrypted_email_and_nonce'] = $libsodium_wrapper->encrypt($cleaned_parameters['sanitised_email']);
    $arr_encrypted['encrypted_dietary_requirements_and_nonce'] = $libsodium_wrapper->encrypt($cleaned_parameters['sanitised_requirements']);

    return $arr_encrypted;
}

function encode($base64_wrapper, $encrypted_data)
{
    $arr_encoded = [];
    $arr_encoded['encoded_username'] = $base64_wrapper->encode_base64($encrypted_data['encrypted_username_and_nonce']);
    $arr_encoded['encoded_email'] = $base64_wrapper->encode_base64($encrypted_data['encrypted_email_and_nonce']);
    $arr_encoded['encoded_requirements'] = $base64_wrapper->encode_base64($encrypted_data['encrypted_dietary_requirements_and_nonce']);
    return $arr_encoded;
}

function hash_values($bcrypt_wrapper, $arr_cleaned_params)
{
    $arr_encoded = [];
    $arr_encoded['hashed_password'] = $bcrypt_wrapper->create_hashed_password($arr_cleaned_params['password']);
    return $arr_encoded;
}

/**
 * function both decodes base64 then decrypts the extracted cipher code
 *
 * @param $libsodium_wrapper
 * @param $base64_wrapper
 * @param $arr_encoded
 * @return array
 */

function decrypt($libsodium_wrapper, $base64_wrapper, $arr_encoded)
{
    $decrypted_values = [];

    $decrypted_values['username'] = $libsodium_wrapper->decrypt(
        $base64_wrapper,
        $arr_encoded['encoded_username']
    );

    $decrypted_values['email'] = $libsodium_wrapper->decrypt(
        $base64_wrapper,
        $arr_encoded['encoded_email']
    );

    $decrypted_values['dietary_requirements'] = $libsodium_wrapper->decrypt(
        $base64_wrapper,
        $arr_encoded['encoded_requirements']
    );

    return $decrypted_values;
}