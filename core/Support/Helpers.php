<?php

use Core\View\View;


if (!function_exists('base_path')) {
  function base_path()
  {
    return dirname(__DIR__, 2);
  }
}


if (!function_exists('view_path')) {
  function view_path()
  {
    return  base_path() . '/app/View';
  }
}


if (!function_exists('view')) {
  function view($mainView, $view, $params = [])
  {
    View::make($mainView, $view, $params);
  }
}
