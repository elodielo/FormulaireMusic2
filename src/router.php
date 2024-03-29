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
//var_dump($_SESSION);

switch ($route) {
  case HOME_URL:
    if ($_SESSION['connecte']) {
      header('location:'.HOME_URL.'recapResa');
      die();
    } else {
      header('location: '.HOME_URL.'formulaire');
    }
    break;

  case HOME_URL.'formulaire':
    $HomeController->afficheForm();
    break;

  case HOME_URL.'traitementConnexion':
    $HomeController->traiterConnexion();
    break;
  
  case HOME_URL.'traiterForm':
    if(!isset($_POST['rgpd'])) {
      echo "Vous devez accepter les conditions de confidentialité et de traitement des données pour continuer.";
      break;
    } else {
    $ReservationsController->traiterFormulaire();
    $HomeController->indexRecap();
     break;}

     case HOME_URL.'envoiMail':
     $HomeController->envoyerMail();
       break;

   case HOME_URL.'formulaire':
   $HomeController->indexRecap();
  break;

  case HOME_URL.'deconnexion':
    $HomeController->quit();
   break;

  case HOME_URL.'recapResa':
    $HomeController->indexRecap();
    break;

  case HOME_URL. 'connexion':
      $HomeController->affichePageConnexion();
      break;
    }

//     case HOME_URL.'connexion':
//       if (isset($_SESSION['connecté'])) {
//         header('location: /dashboard');
//         die;
//       } else {
//         if ($methode === 'POST') {
//           $HomeController->auth($_POST['password']);
//         } else {
//           // $HomeController->index();
//         }
//       }
//       break;
  
//     case HOME_URL.'deconnexion':
//       // $HomeController->quit();
//       break;

//   case $routeComposee[0] == "dashboard":
//     if (isset($_SESSION["connecté"])) {
//       // On a ici toutes les routes qu'on a à partir du dashboard

//       switch ($route) {
//         case $routeComposee[1] == "films":
//           // On a ici toutes les routes qu'on peut faire pour les films
//           switch ($route) {
//             case $routeComposee[2] == "new":
//               if ($methode === "POST") {
//                 $data = $_POST;
//                 // $FilmController->save($data);
//               } else {
//                 // $FilmController->index();
//               }
//               break;

//             case $routeComposee[2] == 'details':
//               // $idFilm = end($routeComposee);
//               // $FilmController->show($idFilm);
//               break;

//             case $routeComposee[2] == "edit":
//               // $idFilm = end($routeComposee);
//               // $FilmController->edit($idFilm);
//               break;

//             case $routeComposee[2] == "update":
//               if ($methode === "POST") {
//                 // $idFilm = end($routeComposee);
//                 // $data = $_POST;
//                 // $FilmController->save($data, $idFilm);
//               }
//               break;

//             case $routeComposee[2] == "delete":
//               // $idFilm = end($routeComposee);
//               // $FilmController->delete($idFilm);
//               break;

//             default:
//               // par défaut on voit la liste des films.
//               // $FilmController->index();
//               break;
//           }

//           break;

//         default:
//           // par défaut une fois connecté, on voit la liste des films.
//           // $FilmController->index();
//           break;
//       }
//     } else {
//       header("location: ".HOME_URL);
//       die;
    // }}