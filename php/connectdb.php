<?php

  try {
    $bdd = new PDO('mysql:dbname=zcar; host=localhost', 'root', '');
  } catch (\Exception $e) {
    die('Error: '.$e->getMessage());
  }

  spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.class.php';
  });



 ?>
