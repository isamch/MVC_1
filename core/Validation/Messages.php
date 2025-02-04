<?php 

namespace Core\Validation;


class Messages {


  public static $messages = [
    'required' => ":field is required",
    'min'      => ":field must be at least :value characters!",
    'max'      => ":field must be less than :value characters!",
    'email'    => ":field Invalid email address!"
  ];


}