<?php

use Core\Http\Router;



Router::get('', 'HomeControllers@index');
Router::get('/', 'HomeControllers@index');
Router::get('home', 'HomeControllers@index');
Router::get('contact', 'HomeControllers@index2');
Router::get('home/{id}', 'HomeControllers@index');

Router::get('help', function () {
  echo 'this is a function';
});



