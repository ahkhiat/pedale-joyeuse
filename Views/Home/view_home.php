<?php

// if(isset($_SESSION['nom'])) {
//     echo 'Prénom de l\'utilisateur : '. $_SESSION['prenom'] . '<br>';
//     echo 'Nom de l\'utilisateur : '. $_SESSION['nom']. '<br>';
//     echo 'Id de l\'utilisateur : '. $_SESSION['id']. '<br>';
// }
?>

<h4 class="text-center mt-5">
Bienvenue <?php if(isset($_SESSION['nom'])) {
    echo $_SESSION["prenom"] ." ". $_SESSION['nom']. '<br>';
}; ?>
Faisons des ventes aujourd'hui !
</h4>

   


