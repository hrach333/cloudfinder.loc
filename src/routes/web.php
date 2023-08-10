<?php
namespace Hrach\Cloudfinder\routes;

use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

function initRout()
{
    $routes = new RouteCollection();
    $routes->add('home', new Route(constant('URL_SUBFOLDER') . '/', array('controller' =>'MainController', 'method' =>'indexAction')));

    $routes->add('upload', new Route(constant('URL_SUBFOLDER') . '/upload', array('controller' => 'OperationFileController', 'method'=>'uploadAction'),[],[],'',[],array('POST')));
    $routes->add('verify', new Route(constant('URL_SUBFOLDER') . '/verify', array('controller' => 'VerifyController', 'method'=>'verifyAction')));
    return $routes;
}


