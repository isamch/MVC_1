<?php 

namespace Core;

use Core\Http\Router;


require_once dirname(__DIR__) . '/core/Support/Helpers.php';
require_once base_path() . '/routes/web.php';


class App
{

  public static function run(){
    
    // session_start();
    



    $requestRoute = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    // $requestRoute = $_SERVER['REQUEST_URI'];
    $requestMethod = $_SERVER['REQUEST_METHOD'];


    Router::RouteHandlers($requestRoute, $requestMethod);

  }


}

?>