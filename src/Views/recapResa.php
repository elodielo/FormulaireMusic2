<?php 
include __DIR__ .'/includes/header.php';


use src\Repositories\ClientRepository;
use src\Repositories\OptionRepository;
use src\Repositories\ReservationRepository;

$clientRepo = new ClientRepository;
$resaRepo = new ReservationRepository;
$idClient = $_SESSION['utilisateur']['id'];
$client = $clientRepo->getClientById($idClient);
$resa = $resaRepo->getClientByIdClient($idClient);
$jour =$resaRepo->recupJourResaavecIDclient($idClient);
$optionRepo = new OptionRepository;
$option = $optionRepo->recupOptionavecIDclient($idClient);
var_dump($option);

?>

 <div id="recapResaDiv">
     <h2> Votre Réservation </h2>
     <p> Bonjour <?php echo $client->nom ?></p>
     <p>La reservation a bien été effectuée</p>
     <p>Voici le récapitulatif : </p>
     <ul>
         <li> Nombre de personnes : <?php echo $resa->nombre ?> </li>
         <li> Jours choisis : <?php echo $jour->jour ?> </li>
         <li> Options : <?php echo $option->nomOption ?>  </li>
         <li> Prix pour les options: <?php echo $option->prixOption ?> </li>
         <li> Nombre de casques : <?php echo $resa->casques ?> </li>
         <li> Nombre de luges: <?php echo $resa->luges ?> </li>
     </ul>
     <p> Le tout pour la somme de : <?php echo $resa->prixTotal ?> euros</p>
</div> 