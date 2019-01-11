<?php
$url_root = $_SERVER['SCRIPT_NAME'];
$url_root = implode('/', explode('/', $url_root, -1));
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        /**
         * Views based on the html.twigs in the templates directory
         */
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

        /**
         * Connects to the MYSQL database
         */
        'database' => [
            'host' => 'localhost',
            'port' => '3306',
            'db_name' => 'sms_db',
            'username' => 'root',
            'password' => '',
        ],
        /**
         * Connects to the EE M2M server with the username and password
         * that were given
         */
        'soap' => [
            'wsdl' => 'https://m2mconnect.ee.co.uk/orange-soap/services/MessageServiceByCountry?wsdl',
            'usr' => '18maxmorris',
            'pwd' => 'Budd3r1ck2310',
        ],

        /**
         * sms prefix for our group
         */
        'group_prefix' => '[18-3310-AL]',
    ],
];
