<?php

namespace src\Repositories;

use PDO;
use src\Models\Reservation;
use src\Models\Database;
use src\Models\ResaOption;

class ResaOptionRepository
{
    private $db;

    public function __construct()
    {
        $database = new Database;
        $this->db = $database->getDB();

    require_once __DIR__ . '/../../config.php';
    }


    public function creerResaOption(ResaOption $reservation)
    {
        $query = $this->db->prepare("INSERT INTO fest_reservations_options (id_res, id_opt, jour) 
                                     VALUES (:id_res, :id_opt, :jour)");
        $query->execute([
            'id_res' => $reservation->getIdResa(),
            'id_opt' => $reservation->getIdOption(),
            'jour' => $reservation->getJour(),
        ]);
    }


}