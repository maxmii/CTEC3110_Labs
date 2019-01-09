<?php
/**
 * Created by PhpStorm.
 * User: Zac Zhang
 * Date: 2018/12/29
 * Time: 19:14
 */
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


// sms api
$app->get('/api/sms/refresh', function (Request $request, Response $response, array $args) {
    $isRefresh = false;
    $smsArray = [];
    do {
        //update this single sentence
        $smsArray = $this->soap->peekMessages($this->soap_usr, $this->soap_pwd, 100);

        $smsModel = new SMSModel($this->db);
        foreach ($smsArray as $smsXml) {
            $smsModel->add(SMS::parse($smsXml));
        }
        $isRefresh = count($smsArray) > 0 ? true : $isRefresh;
 //   } while(count($smsArray) > 0);
    } while(false);
    $resp = array(
        'sc' => 200,
        'has_new' => $isRefresh,
    );
    return $response->withJson($resp);
});

$app->get('/api/sms/count', function (Request $request, Response $response, array $args) {
    $smsModel = new SMSModel($this->db);
    $resp = array(
        'sc' => 200,
        'count' => $smsModel->getCount(),
    );
    return $response->withJson($resp);
});

$app->get('/api/sms/list/{page}/{size}', function (Request $request, Response $response, array $args) {
    $smsModel = new SMSModel($this->db);
    $resp = array(
        'sc' => 200,
        'data' => $smsModel->getList($args['page'], $args['size']),
    );
    return $response->withJson($resp);
});

$app->get('/api/sms/list/self/{page}/{size}/{keyword}', function (Request $request, Response $response, array $args) {
    $smsModel = new SMSModel($this->db);
    $resp = array(
        'sc' => 200,
        'data' => $smsModel->getList($args['page'], $args['size'], $args['keyword']),
    );
    return $response->withJson($resp);
});

$app->post('/api/sms/send', function (Request $request, Response $response, array $args) {
    $sms = json_decode($request->getBody());

    $msg = $this->soap->sendMessage($this->soap_usr, $this->soap_pwd, $sms->dest, false, "");

    return $response->withJson([
        'sc' => 200,
        'msg' => $msg
    ]);
});