<?php

namespace src\Repositories;

use src\Models\Client;
use PDO;
use src\Models\Database;

class ClientRepository
{
  private $DB;

  public function __construct()
  {
    $database = new Database;
    $this->DB = $database->getDB();

    require_once __DIR__ . '/../../config.php';
  }

  
  // public function getAllClients()
  // {
  //   $sql = $this->concatenationRequete("");

  //   return  $this->DB->query($sql)->fetchAll(PDO::FETCH_CLASS, Client::class);
  // }

// 

}
