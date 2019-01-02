<?php
// DIC configuration

$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) {
  $view = new \Slim\Views\Twig(
    $container['settings']['view']['template_path'],
    $container['settings']['view']['twig'],
    [
      'debug' => true // This line should enable debug mode
    ]
  );

  // Instantiate and add Slim specific extension
  $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
  $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

  // This line should allow the use of {{ dump() }} debugging in Twig
  $view->addExtension(new \Twig_Extension_Debug());

  return $view;
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

// database connection
$container['db'] = function ($c) {
    $settings = $c->get('settings')['database'];
    $dsn = 'mysql:host='.$settings['host'] . ';port=' . $settings['port'] . ';dbname=' . $settings['db_name'];
    $pdo = new PDO($dsn, $settings['username'], $settings['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

// sms soap
$container['soap'] = function($c) {
    $conf = $c->get('settings')['soap'];

    // avoid https check
    $ssl['verify_peer'] = false;
    $https['curl_verify_ssl_peer'] = false;
    $https['curl_verify_ssl_host'] = false;
    $context['ssl'] = $ssl;
    $context['https'] = $https;
    $options['location'] = $conf['wsdl'];
    $options['stream_context'] = stream_context_create($context);

    $soap = new SoapClient($conf['wsdl'], $options);
    return $soap;
};

$container['soap_usr'] = function($c) {
    $conf = $c->get('settings')['soap'];
    return $conf['usr'];
};

$container['soap_pwd'] = function($c) {
    $conf = $c->get('settings')['soap'];
    return $conf['pwd'];
};

$container['group_prefix'] = function($c) {
    $conf = $c->get('settings')['group_prefix'];
    return $conf;
};
