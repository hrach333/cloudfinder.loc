<?php

namespace Hrach\Cloudfinder\App;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Exception\NoConfigurationException;
use function Hrach\Cloudfinder\routes\initRout;

class Router
{
    public function __invoke(RouteCollection $routes)
    {
        $context = new RequestContext();
        $request = Request::createFromGlobals();
        $context->fromRequest(Request::createFromGlobals());

        // Routing can match routes with incoming requests
        $matcher = new UrlMatcher($routes, $context);
        try {
            $arrayUri = explode('?', $_SERVER['REQUEST_URI']);
            $matcher = $matcher->match($arrayUri[0]);
    
            // Cast params to int if numeric
            array_walk($matcher, function(&$param)
            {
                if(is_numeric($param)) 
                {
                    $param = (int) $param;
                }
            });
            //создание объекта
            $className = '\\Hrach\\Cloudfinder\\App\\Controllers\\' . $matcher['controller'];
            $classInstance = new $className();
    
            // Добавение маршрута в качестве параметров к следующему классу
            $params = array_merge(array_slice($matcher, 2, -1), array('routes' => $routes));
            //print_r($params);
            call_user_func_array(array($classInstance, $matcher['method']), $params);
            
        } catch (MethodNotAllowedException $e) {
            echo 'Route method is not allowed.';
        } catch (ResourceNotFoundException $e) {
            echo 'Route does not exists.';
        } catch (NoConfigurationException $e) {
            echo 'Configuration does not exists.';
        }
    }
}
//print_r($routes);
// Invoke
$rt = initRout();
$router = new Router();
$router($rt);