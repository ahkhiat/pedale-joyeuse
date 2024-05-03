<?php

if(isset($_SESSION['nom'])) {
    echo 'Prénom de l\'utilisateur : '. $_SESSION['prenom'] . '<br>';
    echo 'Nom de l\'utilisateur : '. $_SESSION['nom']. '<br>';
    echo 'Id de l\'utilisateur : '. $_SESSION['id']. '<br>';
}

?>


   


