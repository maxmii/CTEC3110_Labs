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

        /*// database settings
        'database' => [
            'host' => 'localhost',
            'port' => '3306',
            'db_name' => 'sms_db',
            'username' => 'root',
            'password' => '',
        ],*/
        /*//mysql database
        'pdo' => [
            'rdbms' => 'mysql',
            'host' => 'mysql.tech.dmu.ac.uk',
            'db_name' => 'p16226044db',
            'port' => '4567',
            'user_name' => 'p16226044',
            'user_password' => 'deCor~01',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'options' => [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => true,
            ],
        ],*/

        //local database
        'pdo' => [
            'rdbms' => 'mysql',
            'host' => 'localhost',
            'db_name' => 'sms_db',
            'port' => '3306',
            'user_name' => 'root',
            'user_password' => '',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'options' => [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => true,
            ],
        ],

        // settings
        'soap' => [
            'wsdl' => 'https://m2mconnect.ee.co.uk/orange-soap/services/MessageServiceByCountry?wsdl',
            'usr' => '1816226044',
            'pwd' => 'Zzh19960413',
        ],

        // sms prefix
        'group_prefix' => '[18-3110-AL]',
    ],
];
