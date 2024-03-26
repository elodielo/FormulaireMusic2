<?php

use src\Controllers\ClientController;
// use src\Controllers\ReservationsController;
use src\Services\Routing;

$ClientController = new ClientController;
// $ReservationsController = new ReservationsController;

$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];
$routeComposee = Routing::routeComposee($route);
var_dump(HOME_URL);

switch ($route) {
    case HOME_URL:
      if (isset($_SESSION['connecté'])) {
       var_dump('c');
      } else {
        
        $ClientController->index();
      }
      break;
  
    case HOME_URL.'connexion':
      if (isset($_SESSION['connecté'])) {
        var_dump('e');
        die;
      } else {
        if ($methode === 'POST') {
            var_dump('yo');
        } else {
          var_dump('ya');
        }
      }
      break;
    }
?>