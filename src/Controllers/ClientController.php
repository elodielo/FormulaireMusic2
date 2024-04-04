<?php

namespace src\Controllers;

use src\Models\Client;
use src\Repositories\ClientRepository;
use src\Services\Reponse;

class ClientController
{
  private $ClientRepo;
  // private $CategoryRepo;
  // private $ClassificationRepo;

  use Reponse;


 public function afficherToutesLesResas(){
  $this->render("administrateur");

 } 
}