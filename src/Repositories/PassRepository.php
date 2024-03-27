<?php

namespace src\Repositories;

use src\Models\Pass;
use PDO;
use src\Models\Database;

class PassRepository
{
  private $DB;

  public function __construct()
  {
    $database = new Database;
    $this->DB = $database->getDB();

    require_once __DIR__ . '/../../config.php';
  }

  
  public function getAllPass()
  {
    $sql = "SELECT * FROM fest_pass";

    return  $this->DB->query($sql)->fetchAll(PDO::FETCH_OBJ);
  }

  public function CreerPass($pass)
  {
    $sql = "INSERT INTO fest_pass (typePass, prixPass) VALUES (:typePass, :prixPass);";
    $statement = $this->DB->prepare($sql);

    $statement->execute([
      ':typePass'               => $pass->getTypePass(),
      ':prenom'       => $pass->getPrixPass(),

    ]);

    $id = $this->DB->lastInsertId();
    $pass->setId($id);

    return $pass;
  }

  public function getPassById($id)
  {
      $sql = "SELECT * FROM fest_pass WHERE ID=:id";
      $statement = $this->DB->prepare($sql);
      $statement->execute([':id' => $id]);
      $retour = $statement->fetch(PDO::FETCH_OBJ);
      return $retour;
  }

}
