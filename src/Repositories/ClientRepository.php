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
    $sql = "SELECT * FROM fest_client";

    return  $this->DB->query($sql)->fetchAll(PDO::FETCH_OBJ);
  }

  public function CreerClient(Client $client): Client
  {
    $sql = "INSERT INTO fest_client (NOM, PRENOM, EMAIL, TELEPHONE, ADRESSE, rgpdDate, mdp) VALUES (:nom, :prenom, :email, :telephone, :adresse, :rgpdDate, :mdp);";

    $statement = $this->DB->prepare($sql);

    $statement->execute([
      ':nom'               => $client->getNom(),
      ':prenom'       => $client->getPrenom(),
      ':email'      => $client->getEmail(),
      ':telephone'            => $client->getTelephone(),
      ':adresse'             => $client->getAdresse(),
      ':rgpdDate'           => $client->getRgpdDate(),
      ':mdp'      => $client->getMdp(),

    ]);

    $id = $this->DB->lastInsertId();
    $client->setId($id);

    return $client;
  }

  public function getClientById($id)
  {
    $sql = "SELECT * FROM fest_client WHERE ID=:id";
    $statement = $this->DB->prepare($sql);
    $statement->execute([':id' => $id]);
    $retour = $statement->fetch(PDO::FETCH_OBJ);
    return $retour;
  }

  public function getClientByMailEtMdp($email, $mdp)
  {
    $sql = "SELECT * FROM fest_client WHERE email=:email";
    $statement = $this->DB->prepare($sql);
    $statement->execute([':email' => $email]);

    $client = $statement->fetch(PDO::FETCH_ASSOC);
    $newClient = new Client($client['id'], $client['nom'], $client['prenom'], $client['email'], $client['telephone'], $client['adresse'], $client['rgpdDate'], $client['mdp']);
    if ($client) {
      if (password_verify($mdp, $client['mdp'])) {
        return $newClient;
      } else {
        echo "mot de passe erronne";
      }
    } else {
      echo "utilisateur inconnu";
    }
  }
}
