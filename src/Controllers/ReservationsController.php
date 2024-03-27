<?php

namespace src\Controllers;

use src\Models\Client;
use src\Models\Reservation;
use src\Repositories\ClientRepository;
use src\Repositories\ReservationRepository;
use src\Services\Reponse;

class ReservationsController {

    use Reponse;

public function traiterFormulaire(){
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        if (isset($_POST['nombrePlaces'])
        &&  isset($_POST['nom']) 
        && isset($_POST['prenom']) 
        && isset($_POST['email']) 
        && isset($_POST['telephone']) 
        && isset($_POST['adressePostale'])){
            $prenom = htmlspecialchars($_POST['prenom']);
            $nom = htmlspecialchars($_POST['nom']);
            $nbrReservation = (int)$_POST['nombrePlaces'];
            $telephone = $_POST['telephone'];
            $adresse = $_POST['adressePostale'];
            $tarif= 0;
            $nbrTentes=0;
            $nbrCamions= 0;
            $nbrCasques = (int)$_POST['nombreCasquesEnfants'];
            $nbrLuges = $_POST['NombreLugesEte'];
            $joursChoisis ="";
            $nbrEnfants= "non";
            $rgpd = "";
            $nombreOption = 0;
            $prixOption = 0;
            $reduit = "";
            $prixTotal = 0;
       
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $email = htmlspecialchars($_POST['email']);
              }else {
                header('location:../index.php?erreur=');
              }
         
            if(isset($_POST['pass1jour'])){
              $typePass = $_POST['pass1jour'];
              $prixPass = 40;
            } elseif (isset($_POST['pass2jours'])) {
              $typePass = $_POST['pass2jours'];
              $prixPass = 70;
            }elseif (isset($_POST['pass3jours'])) {
              $typePass = $_POST['pass2jours'];
              $prixPass = 100;            }
            if(isset($_POST['pass1jourreduit'])){
              $typePass = $_POST['pass1jourreduit'];
              $prixPass = 25;
            } elseif (isset($_POST['pass2joursreduit'])) {
              $typePass = $_POST['pass2joursreduit'];
              $prixPass = 50;
            }elseif (isset($_POST['pass3joursreduit'])) {
              $typePass = $_POST['pass3joursreduit'];
              $prixPass = 65;
            }
        
            if(isset($_POST['choixJour1'])){
              $joursChoisis = "01/07";
            }elseif (isset($_POST['choixJour2'])){
              $joursChoisis = "02/07";
            }elseif (isset($_POST['choixJour3'])){
              $joursChoisis = "03/07";
            }elseif (isset($_POST['choixJour12'])){
              $joursChoisis = "du 01/07 au 02/07";
            }elseif (isset($_POST['choixJour23'])){
              $joursChoisis = "du 02/07 au 03/07";
            }
        
            if(isset($_POST['tenteNuit1'])){
              $nomOption = "tente";
              $nombreOption += 1;
              $prixOption += $nombreOption*5;

            }
            if (isset($_POST['tenteNuit2'])) {
              $nomOption = "tente";
              $nombreOption += 1;
              $prixOption += $nombreOption*5;
            }
            if (isset($_POST['tenteNuit3'])) {
              $nomOption = "tente";
              $nombreOption += 1;
              $prixOption += $nombreOption*5;
            }
            if (isset($_POST['tente3Nuits'])) {
              $nomOption = "tente";
              $nombreOption = 3;
              $prixOption = 12;
            }
        
            if(isset($_POST['vanNuit1'])){
              $nomOption = "van";
              $nombreOption += 1;
              $prixOption += $nombreOption*5;
            } 
            if (isset($_POST['vanNuit2'])) {
              $nomOption = "van";
              $nombreOption += 1;
              $prixOption += $nombreOption*5;
            }
        
            if (isset($_POST['vanNuit3'])) {
              $nomOption = "van";
              $nombreOption += 1;
              $prixOption += $nombreOption*5;
            }
            
            if (isset($_POST['van3Nuits'])) {
              $nomOption = "van";
              $nombreOption = 3;
              $prixOption = 12;
            }
        
            if(isset($_POST['enfantsOui'])){
              $nbrEnfants = "oui";
            }elseif (isset($_POST['enfantsNon'])) {
              $nbrEnfants = "non";
            }
  $prixTotal = (($nbrReservation*$prixPass)+$prixOption+($nbrCasques*2));
        
  $newClient = new Client(null,$nom,$prenom,$email,$telephone,$adresse,"2024-02-02");
  $newClientRepo = new ClientRepository();
  $newClientRepo->creerClient($newClient);
  $newResa = new Reservation(null, $nbrReservation, $reduit, $prixTotal, $nbrEnfants,$nbrLuges, $nbrCasques, null);
  $newResaRepo = new ReservationRepository();
  $newResaRepo->creerReservation($newResa);

          }



        
    }
}


}