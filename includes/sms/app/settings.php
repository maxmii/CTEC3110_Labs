<?php
$url_root = $_SERVER['SCRIPT_NAME'];
$url_root = implode('/', explode('/', $url_root, -1));
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        'view' => [
            'template_path' => __DIR__ . '/templates/',
            'twig' => [
                'cache' => false,
                'auto_reload' => true,
            ]
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        // database settings
        'database' => [
            'host' => 'localhost',
            'port' => '3306',
            'db_name' => 'sms_db',
            'username' => 'root',
            'password' => '',
        ],

        // settings
        'soap' => [
            'wsdl' => 'https://m2mconnect.ee.co.uk/orange-soap/services/MessageServiceByCountry?wsdl',
            'usr' => '18maxmorris',
            'pwd' => 'Budd3r1c2310',
        ],

        // sms prefix
        'group_prefix' => '[18-3310-AL]',
    ],
];
