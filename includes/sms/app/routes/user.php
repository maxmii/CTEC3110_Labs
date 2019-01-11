<?php
/**
 * Created by PhpStorm.
 * User: Zac Zhang
 * Date: 2018/12/29
 * Time: 19:20
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function (Request $request, Response $response, array $args) {
    $args['isLogin'] = empty($_SESSION['username']) ? false : true;
    $args['username'] = empty($_SESSION['username']) ? '' : $_SESSION['username'];

    $args['base_url'] = '/sms/index.php';
    /**
     * Returns the the page based on the Index layout
     */
    return $this->view->render($response, 'index.html.twig', $args);

});

$app->get('/login', function (Request $request, Response $response, array $args) {

    $args['base_url'] = '/sms/index.php';

    return $this->view->render($response, 'login.html.twig', $args);
});

$app->post('/api/login', function (Request $request, Response $response, array $args) {
    $userInfo = json_decode($request->getBody());

    $userModel = new UserModel($this->db);

    $loginResult = $userModel->login($userInfo->username, md5($userInfo->pwd));

    /**
     * If the result for the login is unsuccessful will return message saying
     * either the username or password is incorrect
     * if the username and password is correct will login into client
     */
    if($loginResult === false) {
        return $response->withJson([
            'sc' => 301,
            'msg' => 'Username or password is wrong!',
        ]);
    } else {
        $_SESSION['username'] = $userInfo->username;
        return $response->withJson([
            'sc' => 200,
            'msg' => 'Login success!',
        ]);
    }
});
/**
 *Clicking this button will trigger the logout
 */
$app->get('/api/logout', function(Request $request, Response $response, array $args) {
    unset($_SESSION['username']);

    return $response->withJson([
        'sc' => 200,
        'msg' => 'Logout success',
    ]);
});

$app->post('/api/register', function (Request $request, Response $response, array $args) {
    $userInfo = json_decode($request->getBody());

    $userInfo->username = trim($userInfo->username);
    $userInfo->pwd = trim($userInfo->pwd);

    /**
     * Checks the parameters Username and password if both or either blank display message
     */
    if (empty($userInfo->username) || empty($userInfo->username)) {
        return $response->withJson([
            'sc' => 302,
            'msg' => 'Username and password can NOT be empty',
        ]);
    }

    $userModel = new UserModel($this->db);

    $registerResult = $userModel->register($userInfo->username, md5($userInfo->pwd));

    if($registerResult['result'] === false) {
        return $response->withJson([
            'sc' => 302,
            'msg' => $registerResult['msg'],
        ]);
    } else {
        $_SESSION['username'] = $userInfo->username;
        return $response->withJson([
            'sc' => 200,
            'msg' => 'Register success!',
        ]);
    }
});
