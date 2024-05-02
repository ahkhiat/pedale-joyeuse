<?php
// include('./Utils/header_admin.php');
// var_dump($clients);
?>
<div class="table-responsive">
    
    <table id='table' class="table w-75 mx-auto">
    <h2 class="text-center">Liste des clients</h2>

    <div class="align-self-end">
        <a href="?controller=client&action=client_add"><button class="mt-3 btn btn-secondary">Ajouter un client</button></a>
    </div>

        <thead>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Adresse</th>
            <th>Code Postal</th>
            <th>Ville</th>
            <th>Email</th>
            <th>Téléphone</th>
        </thead>
        <?php  foreach($clients as $u ): ?>
        <tr>
            <td><?= $u->nom ?></td>
            <td><?=$u->prenom?></td>
            <td><?=$u->adresse1?></td>
            <td><?=$u->code_postal?></td>
            <td><?=$u->ville?></td>
            <td><?=$u->email?></td>
            <td><?=$u->telephone?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>       