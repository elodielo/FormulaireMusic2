<?php
// session_start();

include __DIR__ .'/includes/header.php';

?>
  <form id="formulaireCo" action="<?php echo HOME_URL.'traitementConnexion'; ?>" method="post">
    <h1>Connexion</h1>
    <label for="emailClient">Mail :</label>
    <input type="email" name="emailClient" id="emailClient" required>
    <label for="mdpClient">Mot de passe :</label>
    <input type="password" name="mdpClient" id="mdpClient" required>
    <input type="submit" value="Se connecter">
  </form>
  </html>
