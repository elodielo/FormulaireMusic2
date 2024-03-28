<?php

namespace src\Controllers;

use src\Repositories\ClientRepository;
use src\Services\Reponse;

class HomeController
{

  use Reponse;

  public function index(): void
  {
    if (isset($_GET['erreur'])) {
      $erreur = htmlspecialchars($_GET['erreur']);
    } else {
      $erreur = '';
    }

    $this->render("Accueil", ["erreur" => $erreur]);
  }

  public function afficheForm()
  {
    $this->render("formulaire");
    exit();
  }

  public function affichePageConnexion()
  {
    $this->render("connexion");
  }

  public function traiterConnexion()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if (isset($_POST['emailClient']) && isset($_POST['mdpClient'])) {
        $emailClient = $_POST['emailClient'];
        $mdpClient = $_POST['mdpClient'];
        $repoClient = new ClientRepository();
        $client = $repoClient->getClientByMailEtMdp($emailClient, $mdpClient);
        if ($client !== null) {
          session_start();
          $_SESSION['utilisateur'] = $client;
          $_SESSION['connecte'] = true;
          var_dump("Ok client connecté");
          header('location:'.HOME_URL.'recapResa');
          die();
        }else{
          // RENVOI SUR PAGE INSCRIPTION OUU PAGE : PAS ENCORE DE RESA
        }
      }
    }
  }


  public function quit()
  {
    session_destroy();
    header('location:'. HOME_URL);
    die();
  }

  public function indexRecap()
  {
    $this->render("recapResa");
  }

  public function page404(): void
  {
    header("HTTP/1.1 404 Not Found");
    $this->render('404');
  }
}
