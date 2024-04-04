<?php

use src\Repositories\ClientRepository;
use src\Repositories\OptionRepository;
use src\Repositories\ReservationRepository;


include __DIR__ . '/includes/header.php';

$clients = new ClientRepository;
$optionsRepo = new OptionRepository;
$resasRepo = new ReservationRepository;

$clients = $clients->getAllClients();
$resas = $resasRepo->getAllReservations();



?>

<table class="tableau-utilisateurs">
    <caption>
        <h2>Liste des utilisateurs</h2>
    </caption>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Mail</th>
            <th>Telephone</th>
            <th>Adresse postale</th>
            <th>Nombre de reservations</th>
            <th>Tarif total</th>
            <th>Jours choisis</th>
            <th>Nombre de casques</th>
            <th>Options Choisies</th>
            <th>Prix pour les options</th>
        </tr>
    </thead>
    <tbody>

    <tbody>
        <?php foreach ($clients as $client) { ?>
            <tr>
                <td><?php echo $client->id; ?></td>
                <td><?php echo $client->nom; ?></td>
                <td><?php echo $client->prenom ?></td>
                <td><?php echo $client->email; ?></td>
                <td><?php echo $client->telephone; ?></td>
                <td><?php echo $client->adresse; ?></td>
                <?php foreach ($resas as $resa) {
                    if ($client->id == $resa->getIdClient()) { ?>
                        <td><?php echo $resa->getNombre(); ?></td>
                        <td><?php echo $resa->getPrixTotal(); ?></td>
                        <td><?php $resaDetails = $resasRepo->recupJourResaavecIDclient($client->id); ?>
                            <?php echo $resaDetails->jour; ?></td>
                        <td><?php echo $resa->getCasques(); ?></td>
                        <td><?php $resaOptions = $optionsRepo->recupOptionavecIDclient($client->id); ?>
                            <?php if (!empty($resaOptions)) { ?>
                                <?php echo $resaOptions->nomOptions; ?></td>
                        <td><?php echo $resaOptions->prix; ?></td>
                    <?php } ?>
            </tr>
<?php }
                }
            }
?>

    </tbody>
</table>