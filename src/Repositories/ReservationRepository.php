<?php

namespace src\Repositories;

use PDO;
use src\Models\Reservation;
use src\Models\Database;

class ReservationRepository
{
    private $db;

    public function __construct()
    {
        $database = new Database;
        $this->db = $database->getDB();

        require_once __DIR__ . '/../../config.php';
    }

    public function getAllReservations()
    {
        $query = $this->db->query("SELECT * FROM fest_reservations");
        $reservationsData = $query->fetchAll(PDO::FETCH_ASSOC);

        $reservations = [];
        foreach ($reservationsData as $reservationData) {
            $reservation = new Reservation(
                $reservationData['id'],
                $reservationData['nombre'],
                $reservationData['reduit'],
                $reservationData['prixTotal'],
                $reservationData['enfants'],
                $reservationData['luges'],
                $reservationData['casques'],
                $reservationData['id_client']
            );
            $reservations[] = $reservation;
        }

        return $reservations;
    }

    public function recupJourResaavecIDclient($idClient)
    {
        $sql = "SELECT jour FROM fest_reservations_pass 
        JOIN fest_reservations ON fest_reservations_pass.id_resa = fest_reservations.id
        WHERE fest_reservations.id_client = :id;";
        $statement = $this->db->prepare($sql);
        $statement->execute([':id' => $idClient]);
        $retour = $statement->fetch(PDO::FETCH_OBJ);
        return $retour;
    }

    public function getReservationById($id)
    {
        $query = $this->db->prepare("SELECT * FROM fest_reservations WHERE id = :id");
        $query->execute(['id' => $id]);
        $reservationData = $query->fetch(PDO::FETCH_ASSOC);

        if (!$reservationData) {
            return null;
        }

        return new Reservation(
            $reservationData['id'],
            $reservationData['nombre'],
            $reservationData['reduit'],
            $reservationData['prix_total'],
            $reservationData['enfants'],
            $reservationData['luges'],
            $reservationData['casques'],
            $reservationData['id_client']
        );
    }
    public function supprimerReservation($id)
    {
        $query = $this->db->prepare("DELETE FROM fest_reservations WHERE id = :id");
        $query->execute(['id' => $id]);
    }

    public function getReservationByIdClient($idClient)
    {
        $sql = "SELECT * FROM fest_reservations WHERE id_client=:id";
        $statement = $this->db->prepare($sql);
        $statement->execute([':id' => $idClient]);
        $retour = $statement->fetch(PDO::FETCH_OBJ);
        return $retour;
    }


    public function creerReservation(Reservation $reservation)
    {
        $query = $this->db->prepare("INSERT INTO fest_reservations (nombre, reduit, prixTotal, enfants, luges, casques, id_client) 
                                     VALUES (:nombre, :reduit, :prixTotal, :enfants, :luges, :casques, :id_client)");
        $query->execute([
            ':nombre' => $reservation->getNombre(),
            ':reduit' => $reservation->getReduit(),
            ':prixTotal' => $reservation->getPrixTotal(),
            ':enfants' => $reservation->getEnfants(),
            ':luges' => $reservation->getLuges(),
            ':casques' => $reservation->getCasques(),
            ':id_client' => $reservation->getIdClient()
        ]);
        $id = $this->db->lastInsertId();
        $reservation->setId($id);

        return $reservation;
    }

    public function updateReservation(Reservation $reservation)
    {
        $query = $this->db->prepare("UPDATE fest_reservations SET 
                                     nombre = :nombre, reduit = :reduit, prix_total = :prix_total, 
                                     enfants = :enfants, luges = :luges, casques = :casques, id_client = :id_client 
                                     WHERE id = :id");
        $query->execute([
            'id' => $reservation->getId(),
            'nombre' => $reservation->getNombre(),
            'reduit' => $reservation->getReduit(),
            'prix_total' => $reservation->getPrixTotal(),
            'enfants' => $reservation->getEnfants(),
            'luges' => $reservation->getLuges(),
            'casques' => $reservation->getCasques(),
            'id_client' => $reservation->getIdClient()
        ]);
    }
}
