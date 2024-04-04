<?php
include __DIR__ . '/includes/header.php';


use src\Repositories\ClientRepository;
use src\Repositories\OptionRepository;
use src\Repositories\ReservationRepository;

$clientRepo = new ClientRepository;
$resaRepo = new ReservationRepository;
$optionRepo = new OptionRepository;

$idClient = $_SESSION['utilisateur']->getId();
$client = $clientRepo->getClientById($idClient);

$resa = $resaRepo->getReservationByIdClient($idClient);
$jour = $resaRepo->recupJourResaavecIDclient($idClient);

$option = $optionRepo->recupOptionavecIDclient($idClient);

?>

<div id="recapResaDiv">
    <h2> Votre Réservation </h2>
    <p> Bonjour <?php echo $client->prenom . " " . $client->nom ?></p>
    <p>La reservation a bien été effectuée</p>
    <p>Voici le récapitulatif : </p>
    <ul>
        <li> Nombre de personnes : <?php echo $resa->nombre ?> </li>
        <li> Jours choisis : <?php echo $jour->jour ?> </li>
        <li> Options : <?php echo $option->nomOptions ?> </li>
        <li> Prix pour les options: <?php echo $option->prix ?> </li>
        <li> Nombre de casques : <?php echo $resa->casques ?> </li>
        <li> Nombre de luges: <?php echo $resa->luges ?> </li>
    </ul>
    <p> Le tout pour la somme de : <?php echo $resa->prixTotal ?> euros</p>
    <a href="<?php echo HOME_URL . 'envoiMail'; ?>"> Envoi par mail</a>
</div>