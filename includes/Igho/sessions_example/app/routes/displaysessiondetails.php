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

$app->get('/displaysessiondetails',
    function(Request $request, Response $response) use ($app)
    {
        // get all dependencies from DI
        $wrapper_mysql = $this->get('mysql_wrapper');
        $db_handle = $this->get('dbase');
        $sql_queries = $this->get('sql_queries');
        $session_model = $this->get('session_model');

        // prepare for DB interaction
        $session_model->set_server_type('database');
        $session_model->set_wrapper_session_db($wrapper_mysql);
        $session_model->set_db_handle($db_handle);
        $session_model->set_sql_queries($sql_queries);
        // we make 2 calls to the DB below. 1st one gets user name and second gets password (they come as collection, which returns only 1 username in this scenario)
        // but you can use this code for dealing with SMS messages where you will have more than 1 row back from the DB
        $user_name_read_result = $session_model->read_data_from_database('user_name'); //
        $user_password_read_result = $session_model->read_data_from_database('user_password');
        var_dump($user_name_read_result);
        var_dump($user_password_read_result);

        $sid = session_id();

        return $this->view->render($response,
            'display_db_session_result.html.twig',
            [
                'landing_page' => $_SERVER["SCRIPT_NAME"],
                'css_path' => CSS_PATH,
                'page_title' => 'Sessions Demonstration',
                'page_heading_1' => 'Sessions Demonstration',
                'page_heading_2' => 'Session storage result DB read',
                'sid_text' => 'Your super secret session SID is ',
                'username_text' => 'Your username is ',
                'password_text' => 'Your password is ',
                'sid' => $sid,
                'storage_text' => 'The values stored were (below values were actually read in the DB):',
                'username_res' => $user_name_read_result,
                'password_res' => $user_password_read_result,
            ]);

    });


