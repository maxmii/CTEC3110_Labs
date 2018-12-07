<?php
/**
 * Created by PhpStorm.
 * User: slim
 * Date: 13/10/17
 * Time: 12:33
 */

ini_set('display_errors', 'On');
ini_set('html_errors', 'On');
ini_set('xdebug.trace_output_name', 'stock_quote_details.%t');

define('DIRSEP', DIRECTORY_SEPARATOR);

$url_root = $_SERVER['SCRIPT_NAME'];
$url_root = implode('/', explode('/', $url_root, -1));
$css_path = $url_root . '/css/standard.css';

$script_filename = $_SERVER["SCRIPT_FILENAME"];
$arr_script_filename = explode('/' , $script_filename, '-1');
$script_path = implode('/', $arr_script_filename) . '/';

define('CSS_PATH', $css_path);
define('APP_NAME', 'Stock Quote Charts');
define('LANDING_PAGE', $_SERVER['SCRIPT_NAME']);

define ('LIB_CHART_OUTPUT_PATH', 'media/charts/');
define ('LIB_CHART_PATH', $url_root . '/media/charts/');
define ('LIB_CHART_FILE_PATH', $script_path);
define ('LIB_CHART_CLASS_PATH', 'libchart/classes/');

define('SUBMIT_BUTTON', 'Fetch the company history >>>');

$settings = [
  "settings" => [
    'displayErrorDetails' => true,
    'addContentLengthHeader' => false,
    'mode' => 'development',
    'debug' => true,
    'class_path' => __DIR__ . '/src/',
    'view' => [
      'template_path' => __DIR__ . '/templates/',
      'twig' => [
        'cache' => false,
        'auto_reload' => true,
      ]],
    'pdo' => [
      'rdbms' => 'mysql',
      'host' => 'localhost',
      'db_name' => 'stockquote_db',
      'port' => '3306',
      'user_name' => 'stockquote_user',
      'user_password' => 'stockquote_user_pass',
      'charset' => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'options' => [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => true,
      ],
    ]
  ],
];

return $settings;
