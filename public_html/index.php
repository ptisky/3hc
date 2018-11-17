<?php

// auto-chargement des classes
require_once __DIR__ . '/../vendor/autoload.php';

// import des classes
use App\Core\Routing;
use App\Core\ServiceContainer;

//service container
$serviceContainer = new ServiceContainer();

$session = $serviceContainer->getService('service.session');
//var_dump($_SESSION);

$routing = $serviceContainer->getService('core.routing');



// routage
//$routing = new Routing();

// récupération du contrôleur et de la méthode
$controller =  $serviceContainer->getService($routing->getRoute()['controller']);
$method = $routing->getRoute()['method'];

//$control = new $controller();
$controller->$method($routing->getRouteVar());
