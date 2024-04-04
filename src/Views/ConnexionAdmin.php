<?php 
include __DIR__ .'/includes/header.php'; 



?>

<form action= '<?php echo HOME_URL.'traitementConnexionAdmin'; ?>' method="post" >
    <h2>Panel administrateur </h2>
  
   
    <label for="password">Mot de passe :</label>
    <input type="password" name="password" id="password" required>
    <div id="message"></div>
   
     
    <input type="submit" value="Se connecter">
  </form>
