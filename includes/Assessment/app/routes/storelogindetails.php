<?php
/**
 Store details of login
 */

use Slim\Http\Request;
use Slim\Http\Response;

$app->post(
    '/storesessiondetails',
    function(Request $request, Response $response) use ($app)
    {
        $arr_tainted_params = $request->getParsedBody();

        $validator = $this->get('session_validator');

        $tainted_username = $arr_tainted_params['username'];
        $password = $arr_tainted_params['password'];
        $tainted_server_type = $arr_tainted_params['server_type'];

        $sanitised_username = $validator->sanitise_string($tainted_username);
        $validated_server_type = $validator->validate_server_type($tainted_server_type);

        $session_wrapper = $this->get('session_wrapper');
        $wrapper_mysql = $this->get('mysql_wrapper');
        $db_handle = $this->get('dbase');
        $sql_queries = $this->get('sql_queries');
        $session_model = $this->get('session_model');

        $session_model->set_session_values($sanitised_username, $password);
        $session_model->set_server_type($validated_server_type);
        $session_model->set_wrapper_session_file($session_wrapper);
        $session_model->set_wrapper_session_db($wrapper_mysql);
        $session_model->set_db_handle($db_handle);
        $session_model->set_sql_queries($sql_queries);
        $session_model->store_data();
        $store_result = $session_model->get_storage_result();
        var_dump($store_result);

        $sid = session_id();

        $arr_storage_result_message = '';
        return $this->view->render($response,
            'display_storage_result.html.twig',
            [
                'landing_page' => $_SERVER["SCRIPT_NAME"],
                'action' => 'index.php/displaysessiondetails',
                'css_path' => CSS_PATH,
                'page_title' => 'Sessions Demonstration',
                'page_heading_1' => 'Sessions Demonstration',
                'page_heading_2' => 'Session storage result',
                'sid_text' => 'Your super secret session SID is ',
                'sid' => $sid,
                'storage_text' => 'The values stored were:',
                'username' => $sanitised_username,
                'password' => $password,
                'server_type' => $validated_server_type,
                'storage_result_message' => $arr_storage_result_message,
            ]);

    });
