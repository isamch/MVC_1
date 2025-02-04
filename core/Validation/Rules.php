<?php

namespace Core\Validation;


class Rules
{

  public static $rules = [
    'username' => 'required|min:6|max:20',
    'lastname' => 'required|min:6|max:20',
    'email'    => 'required|email',
    // 'password' => 'required|min:6'
  ];


}
