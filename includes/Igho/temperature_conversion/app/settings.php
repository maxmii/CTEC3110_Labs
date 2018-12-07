<?php
/**
 * Created by PhpStorm.
 * User: slim
 * Date: 13/10/17
 * Time: 12:33
 */

ini_set('display_errors', 'On');
ini_set('html_errors', 'On');
ini_set('xdebug.trace_output_name', 'temp_conversion.%t');

define('DIRSEP', DIRECTORY_SEPARATOR);

$url_root = $_SERVER['SCRIPT_NAME'];
$url_root = implode('/', explode('/', $url_root, -1));
$css_path = $url_root . '/css/standard.css';
define('CSS_PATH', $css_path);
define('APP_NAME', 'Temperature Conversion');
define('LANDING_PAGE', $_SERVER['SCRIPT_NAME']);
define('LOWEST_CENTIGRADE_TEMPERATURE', -273.16 );
define('LOWEST_WINDSPEED', 0);

$wsdl = 'http://webservices.daehosting.com/services/TemperatureConversions.wso?WSDL';
define('WSDL', $wsdl);

$temperature_units = [
  'CelsiusToFahrenheit' => 'Celsius To Fahrenheit',
  'FahrenheitToCelsius' => 'Fahrenheit To Celsius',
  'WindChillInCelsius' => 'WindChill In Celsius',
  'WindChillInFahrenheit' => 'WindChill In Fahrenheit'
    ];

define ('TEMP_UNITS', $temperature_units);

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
  ],
];

return $settings;
