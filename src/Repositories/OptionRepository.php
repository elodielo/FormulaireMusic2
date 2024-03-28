<?php

namespace src\Repositories;

use src\Models\Option;
use PDO;
use src\Models\Database;

class OptionRepository
{
  private $DB;

  public function __construct()
  {
    $database = new Database;
    $this->DB = $database->getDB();

    require_once __DIR__ . '/../../config.php';
  }

  
  public function getAllOptions()
  {
    $sql = "SELECT * FROM fest_options";

    return  $this->DB->query($sql)->fetchAll(PDO::FETCH_OBJ);
  }

  public function CreerOption(Option $client): Option
  {
    $sql = "INSERT INTO fest_options (nomOptions, prix, nombre) VALUES (:nomOptions, :prix, :nombre);";

    $statement = $this->DB->prepare($sql);

    $statement->execute([
      ':nomOptions'               => $client->getNomOption(),
      ':prix'       => $client->getPrixOption(),
      ':nombre'      => $client->getNombreOption(),
    ]);

    $id = $this->DB->lastInsertId();
    $client->setId($id);

    return $client;
  }

  public function recupOptionavecIDclient($idClient)
  {
      $sql = "SELECT * FROM fest_options 
      JOIN fest_reservations_options ON fest_options.id = fest_reservations_options.id_opt
      JOIN fest_reservations ON fest_reservations.id = fest_reservations_options.id_res
      WHERE fest_reservations.id_client = :id;";
      $statement = $this->DB->prepare($sql);
      $statement->execute([':id' => $idClient]);
      $retour = $statement->fetch(PDO::FETCH_OBJ);
      return $retour;
  }

}
