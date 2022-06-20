<?php

use function PHPSTORM_META\type;

  require_once '../app/bootstrap.php';

  // Init Core Library
  try {
    //code...
    $init = new Core;
  } catch (Exception $e) {
    //throw $th;
    $err = $e->getMessage();
    require_once '../app/views/404.php';
  }
    