<?php

use src\Models\Database;
use src\Models\Reservation;

require_once 'Database.php';
require_once 'Reservations.php';

class ReservationRepository {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAllReservations() {
        $query = "SELECT * FROM reservations";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $reservations = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $reservation = new Reservation();
            $reservation->setId($row['id']);
            $reservation->setDateReservation($row['date_reservation']);
            // Assurez-vous d'ajouter d'autres propriétés de la réservation selon votre modèle de données
            $reservations[] = $reservation;
        }
        return $reservations;
    }

    public function getReservationById($id) {
        $query = "SELECT * FROM reservations WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $reservation = new Reservation();
        $reservation->setId($row['id']);
        $reservation->setDateReservation($row['date_reservation']);
        // Assurez-vous d'ajouter d'autres propriétés de la réservation selon votre modèle de données
        return $reservation;
    }

    public function saveReservation(Reservation $reservation) {
        $query = "INSERT INTO reservations (date_reservation) VALUES (:date_reservation)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':date_reservation', $reservation->getDateReservation());
        // Assurez-vous d'ajouter d'autres paramètres de liaison selon votre modèle de données
        $stmt->execute();
    }

    // Ajoutez d'autres méthodes selon les besoins, par exemple pour mettre à jour ou supprimer une réservation
}
