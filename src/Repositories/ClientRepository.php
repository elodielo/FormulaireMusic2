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

  
  public function getAllClients()
  {
    $sql = "SELECT * FROM fest_Client";

    return  $this->DB->query($sql)->fetchAll(PDO::FETCH_CLASS, Client::class);
  }

  public function CreerClient(Client $client): Client
  {
    $sql = "INSERT INTO fest_client (NOM, PRENOM, EMAIL, TELEPHONE, ADRESSE, rgpdDate) VALUES (:nom, :prenom, :email, :telephone, :adresse, :rgpdDate);";

    $statement = $this->DB->prepare($sql);

    $statement->execute([
      ':nom'               => $client->getNom(),
      ':prenom'       => $client->getPrenom(),
      ':email'      => $client->getEmail(),
      ':telephone'            => $client->getTelephone(),
      ':adresse'             => $client->getAdresse(),
      ':rgpdDate'           => $client->getRgpdDate()

    ]);

    $id = $this->DB->lastInsertId();
    $client->setId($id);

    return $client;
  }



}
