<?php

use src\Controllers\ClientController;
use src\Controllers\ReservationsController;
use src\Services\Routing;
use src\Controllers\HomeController;
use src\Models\Client;
use src\Repositories\ClientRepository;

$HomeController = new HomeController;
$ClientController = new ClientController;
$ReservationsController = new ReservationsController;

$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];
$routeComposee = Routing::routeComposee($route);

switch ($route) {
  case HOME_URL:
    if ($_SESSION['connecte']) {
      header('location:' . HOME_URL . 'recapResa');
      die();
    } else {
      header('location: ' . HOME_URL . 'formulaire');
    }
    break;

  case HOME_URL . 'formulaire':
    $HomeController->afficheForm();
    break;

  case HOME_URL . 'traitementConnexion':
    $HomeController->traiterConnexion();
    break;

    case HOME_URL . 'traitementConnexionAdmin':
      $HomeController->traiterConnexionAdmin();
      break;

  case HOME_URL . 'traiterForm':
    if (!isset($_POST['rgpd'])) {
      echo "Vous devez accepter les conditions de confidentialité et de traitement des données pour continuer.";
      break;
    } else {
      if ($_POST['mdp'] === $_POST['mdp2']) {
        $ReservationsController->traiterFormulaire();
        $HomeController->indexRecap();
        break;
      } else {
        echo "Les mots de passe ne correspondent pas";
      }
    }

  case HOME_URL . 'envoiMail':
    $HomeController->envoyerMail();
    break;

  case HOME_URL . 'formulaire':
    $HomeController->indexRecap();
    break;

  case HOME_URL . 'deconnexion':
    $HomeController->quit();
    break;

  case HOME_URL . 'recapResa':
    $HomeController->indexRecap();
    break;

  case HOME_URL . 'connexion':
    $HomeController->affichePageConnexion();
    break;

    case HOME_URL . 'admin':
      $HomeController->affichePageConnexionAdmin();
      break;
    
      case HOME_URL . 'adminAutorise':
        if($_SESSION['autorise'] == true) {
          $ClientController-> afficherToutesLesResas();
          break;
        } else {
          $ClientController->afficherLaPageDeConnexion();};
        break; 
    
  default:
    $HomeController->page404();
    break;
}
