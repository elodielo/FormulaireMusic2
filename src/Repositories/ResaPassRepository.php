<?php

namespace src\Repositories;

use PDO;
use src\Models\Reservation;
use src\Models\Database;
use src\Models\ResaPass;

class ResaPassRepository
{
    private $db;

    public function __construct()
    {
        $database = new Database;
        $this->db = $database->getDB();

        require_once __DIR__ . '/../../config.php';
    }


    public function creerResaPass(ResaPass $reservation)
    {
        $query = $this->db->prepare("INSERT INTO fest_reservations_pass (id_resa, id_pass, jour) 
                                     VALUES (:id_resa, :id_pass, :jour)");
        $query->execute([
            'id_resa' => $reservation->getIdResa(),
            'id_pass' => $reservation->getIdPass(),
            'jour' => $reservation->getJour(),
        ]);
    }
}
