<?php

namespace Core\Http;


class Router
{


  private static $routes = [];


  public static function get($route, $action)
  {
    self::$routes['GET'][$route] = $action;
  }


  public static function post($route, $action)
  {
    self::$routes['POST'][$route] = $action;
  }





  // handling Routes:
  public static function RouteHandlers($requestRoute, $requestMethod)
  {

    dump($requestRoute);

    $requestRoute = str_replace('index.php', '', $requestRoute);
    $requestRoute = str_replace('MVC_1/public', '', $requestRoute);
    $requestRoute = trim($requestRoute, '/');

    // match router :
    $match = self::matchRoute($requestRoute, $requestMethod);



    if ($match) {
      [$action, $params] = $match;

      if (is_callable($action)) {
        return call_user_func($action);
      }


      if (is_string($action)) {
        $actionArr = explode('@', $action);
        $controllerClass = "App\\Controllers\\$actionArr[0]";

        if (!class_exists($controllerClass)) {
          echo 'class not exist';
          return;
        }

        if (!method_exists($controllerClass, $actionArr[1])) {
          echo 'method not exist';
          return;
        }


        return call_user_func_array([new $controllerClass, $actionArr[1]], $params ?? []);
      }
    } else {
      echo ' 404 error --';
    }
  }



  // match routes:
  private static function matchRoute($requestRoute, $requestMethod)
  {


    dump("request route: " . $requestRoute);

    foreach (self::$routes[$requestMethod] ?? [] as $patterneRoute => $action) {


      $route = preg_replace('/\{[a-zA-Z_]+\}/', '(\d+)', $patterneRoute);


      if (preg_match('#^' . $route . '$#', $requestRoute, $matches)) {


        // dump("regex route: " . $route);

        // dump("myroue pattern : " . $patterneRoute);

        // if (!is_callable($action)) {
        //   dump("action : " . $action);
        // }

        array_shift($matches);


        return [$action, $matches];
      }
    }
  }



}
