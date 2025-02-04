<?php 

namespace App\Controllers;

use Core\View\View;

class HomeControllers
{

  public function index()
  {
    
    // View::make('home', ['title' => 'MVC Home']);
    
    // view inside page :
    view('main', 'home', ['title' => 'MVC Home', 'last_name' => 'MylastName', 'arr' => [1, 2, 3, 4]]);
    exit;
  }

  
  public function index2()
  {
    
    // View::make('home', ['title' => 'MVC Home']);
    
    // view inside page :
    view('main', 'contact', ['title' => 'MVC Home 2', 'last_name' => 'MylastName 2']);
    exit;
  }

}


?>