<?php

namespace Core\Validation;


class Validator
{

  private $data;
  private $errors = [];


  public function __construct($data)
  {
    $this->data = $data;
    $this->validate();
  }


  public function validate()
  {
    foreach (Rules::$rules as $field  => $rules) {
      // dump($field);

      $rules = explode('|', $rules);


      foreach ($rules as $rule) {
        $this->applyRules($rule, $field);
      }
    }
  }



  public function applyRules($rule, $field)
  {
    $value = trim($this->data[$field] ?? '');


    if ($rule == 'required' && empty($value)) {

      $this->addError($field, $rule);
    }


    if (explode(':', $rule)[0] == 'min') {

      $min = explode(':', $rule)[1];

      
      if (strlen($value) < $min) {
        $this->addError($field, explode(':', $rule)[0], $value);
      }
    }


    if (explode(':', $rule)[0] == 'max') {

      $max = explode(':', $rule)[1];

      if (strlen($value) > $max) {

        $this->addError($field, explode(':', $rule)[0], $value);
      }
    }

    if ($rule === 'email' && !empty($value) && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
      $this->addError($field, $rule);
    }


  }




  // add errors : 
  private function addError($field, $rule, $value = null)
  {
    $message = Messages::$messages[$rule];
    $message = str_replace(':field', $field, $message);

    if ($value) {
      $message = str_replace(':value', $value, $message);
    }

    $this->errors[$field][] = $message;
  }


  public function getErrors() {
    return $this->errors;
  }

  
  public function isErrors() {
    return !empty($this->errors);
  }

}
