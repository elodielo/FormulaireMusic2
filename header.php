<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/styleHeader.css">
  <script defer src="assets/js/script.js" type="module"></script>
  <title>Formulaire de réservation Music Vercos Festival</title>
</head>
<header>
  <div id="enTete" class="flexLigne">
    <img id="logo" src="../assets/images/logo.png" alt="logo montagne">
    <h1> Music Vercors Festival </h1>
  </div>
  <div>
    <?php if (isset($_SESSION['connecte'])) { ?>
      <a href=<?php echo HOME_URL . 'deconnexion'; ?>>Déconnexion</a>
    <?php } else { ?>
      <a href="<?php echo HOME_URL . 'connexion'; ?>">Connexion</a>
    <?php } ?>
  </div>
</header>

<body>