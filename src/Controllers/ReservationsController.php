<?php

namespace src\Controllers;

use DateTime;
use src\Models\Client;
use src\Models\Database;
use src\Models\Option;
use src\Models\Pass;
use src\Models\ResaOption;
use src\Models\ResaPass;
use src\Models\Reservation;
use src\Repositories\ClientRepository;
use src\Repositories\PassRepository;
use src\Repositories\ResaPassRepository;
use src\Repositories\ReservationRepository;
use src\Repositories\OptionRepository;
use src\Repositories\ResaOptionRepository;
use src\Services\Reponse;

class ReservationsController
{
    use Reponse;

    public function traiterFormulaire()
    {
        $DB = new Database;

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (
                isset($_POST['nombrePlaces'])
                &&  isset($_POST['nom'])
                && isset($_POST['prenom'])
                && isset($_POST['email'])
                && isset($_POST['telephone'])
                && isset($_POST['adressePostale'])
            ) {
                $prenom = htmlspecialchars($_POST['prenom']);
                $nom = htmlspecialchars($_POST['nom']);
                $nbrReservation = (int)$_POST['nombrePlaces'];
                $telephone = $_POST['telephone'];
                $adresse = $_POST['adressePostale'];
                $nbrCasques = (int)$_POST['nombreCasquesEnfants'];
                $nbrLuges = $_POST['NombreLugesEte'];
                $joursChoisis = "";
                $nbrEnfants = "non";
                $nombreOption = 0;
                $prixOption = 0;
                $reduit = "";
                $prixTotal = 0;
                $mdp = $_POST['mdp'];
                $mdp2 = $_POST['mdp2'];
                $jourOption = "";
                $nomOption = "";

                if ($mdp === $mdp2) {
                    $hashMdp = password_hash($mdp, PASSWORD_DEFAULT);

                    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                        $email = htmlspecialchars($_POST['email']);
                    } else {
                        var_dump('erreur email');
                        die();
                    }

                    if (isset($_POST['pass1jour'])) {
                        $typePass = 'pass1jour';
                        $prixPass = 40;
                    } elseif (isset($_POST['pass2jours'])) {
                        $typePass = 'pass2jours';
                        $prixPass = 70;
                    } elseif (isset($_POST['pass3jours'])) {
                        $typePass = 'pass3jours';
                        $prixPass = 100;
                    }
                    if (isset($_POST['pass1jourreduit'])) {
                        $typePass = 'pass1jourreduit';
                        $prixPass = 25;
                    } elseif (isset($_POST['pass2joursreduit'])) {
                        $typePass = 'pass2joursreduit';
                        $prixPass = 50;
                    } elseif (isset($_POST['pass3joursreduit'])) {
                        $typePass = 'pass3joursreduit';
                        $prixPass = 65;
                    }

                    if (isset($_POST['choixJour1'])) {
                        $joursChoisis = "01/07";
                    } elseif (isset($_POST['choixJour2'])) {
                        $joursChoisis = "02/07";
                    } elseif (isset($_POST['choixJour3'])) {
                        $joursChoisis = "03/07";
                    } elseif (isset($_POST['choixJour12'])) {
                        $joursChoisis = "du 01/07 au 02/07";
                    } elseif (isset($_POST['choixJour23'])) {
                        $joursChoisis = "du 02/07 au 03/07";
                    }

                    if (isset($_POST['tenteNuit1'])) {
                        $nomOption = "tente";
                        $jourOption = "01/07";
                        $nombreOption += 1;
                        $prixOption += $nombreOption * 5;
                    }

                    if (isset($_POST['tenteNuit2'])) {
                        $nomOption = "tente";
                        $jourOption = "02/07";
                        $nombreOption += 1;
                        $prixOption += $nombreOption * 5;
                    }
                    if (isset($_POST['tenteNuit3'])) {
                        $nomOption = "tente";
                        $jourOption = "03/07";
                        $nombreOption += 1;
                        $prixOption += $nombreOption * 5;
                    }
                    if (isset($_POST['tente3Nuits'])) {
                        $nomOption = "tente";
                        $jourOption = "du 01/07 au 03/07";
                        $nombreOption = 3;
                        $prixOption = 12;
                    }

                    if (isset($_POST['vanNuit1'])) {
                        $nomOption = "van";
                        $jourOption = "01/07";
                        $nombreOption += 1;
                        $prixOption += $nombreOption * 5;
                    }
                    if (isset($_POST['vanNuit2'])) {
                        $nomOption = "van";
                        $jourOption = "02/07";
                        $nombreOption += 1;
                        $prixOption += $nombreOption * 5;
                    }

                    if (isset($_POST['vanNuit3'])) {
                        $nomOption = "van";
                        $jourOption = "03/07";
                        $nombreOption += 1;
                        $prixOption += $nombreOption * 5;
                    }

                    if (isset($_POST['van3Nuits'])) {
                        $nomOption = "van";
                        $jourOption = "du 01/07 au 03/07";
                        $nombreOption = 3;
                        $prixOption = 12;
                    }

                    if (isset($_POST['enfantsOui'])) {
                        $nbrEnfants = "oui";
                    } elseif (isset($_POST['enfantsNon'])) {
                        $nbrEnfants = "non";
                    }

                    $prixOption = $prixOption * $nbrReservation;
                    $rgpdDate = new DateTime();
                    $rgpdstring = $rgpdDate->format('Y-m-d');

                    $prixTotal = (($nbrReservation * $prixPass) + $prixOption + ($nbrCasques * 2));

                    $newClient = new Client(null, $nom, $prenom, $email, $telephone, $adresse, $rgpdstring, $hashMdp);
                    $newClientRepo = new ClientRepository();
                    $newClient = $newClientRepo->creerClient($newClient);
                    $_SESSION['connecte'] = true;
                    $_SESSION['utilisateur'] = $newClient;

                    $newResa = new Reservation(null, $nbrReservation, $reduit, $prixTotal, $nbrEnfants, $nbrLuges, $nbrCasques, $newClient->getId());
                    $newResaRepo = new ReservationRepository();
                    $newResa = $newResaRepo->creerReservation($newResa);

                    $newPass = new Pass(null, $typePass, $prixPass);
                    $newPassRepo = new PassRepository();
                    $newPass = $newPassRepo->CreerPass($newPass);

                    $newPassResa = new ResaPass($newResa->getId(), $newPass->getId(), $joursChoisis);
                    $newPassResaRepo = new ResaPassRepository();
                    $newPassResaRepo->creerResaPass($newPassResa);

                    $newOption = new Option(null, $nomOption, $prixOption, $nombreOption);
                    $newOptionRepo = new OptionRepository();
                    $newOption = $newOptionRepo->CreerOption($newOption);

                    $newResaOption = new ResaOption($newResa->getId(), $newOption->getId(), $jourOption);
                    $newResaOptionRepo = new ResaOptionRepository();
                    $newResaOptionRepo->creerResaOption($newResaOption);
                } else {
                    // var_dump('erreur mot de passe');
                    die();
                }
            }
        }
    }
}
