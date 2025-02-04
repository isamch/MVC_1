<?php 



  require_once dirname(__DIR__) . '/vendor/autoload.php';

 
  use Dotenv\Dotenv;
  use Core\App;

  
  $dotenv = Dotenv::createImmutable(dirname(__DIR__));
  $dotenv->load();
  
  
  echo $_ENV['APP_NAME'];
  

  // connection
  use Core\Validation\Validator;

  // Database::getConnection();

  $data = [
    'username' => 'isam',
    'lastname' => 'chajia',
    'email' => 'chajiaisam@gmail.com'
  ];


  $validation1 = new Validator($data);

  if ($validation1->isErrors()) {
    
    dump($validation1->getErrors());
  }


  // App::run();
  

?>