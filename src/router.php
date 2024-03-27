<?php

use src\Controllers\ClientController;
// use src\Controllers\ReservationsController;
use src\Services\Routing;
use src\Models\Client;
use src\Repositories\ClientRepository;

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

var_dump('coucou');

$client = new Client(null, "La", "Elodie", "la@la", "0767676767","lololo", "2024-02-02");
$clientRepo = new ClientRepository;

$client1 = $clientRepo->CreerClient($client);
var_dump($client1);
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