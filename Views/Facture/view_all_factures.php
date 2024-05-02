<?php
// include('./Utils/header_admin.php');
// var_dump($factures);
?>
<div class="table-responsive">
    
    <table id='table' class="table w-75 mx-auto">
    <h2 class="text-center">Liste des factures</h2>

    <div class="align-self-end">
        <a href="?controller=facture&action=facture_add"><button class="mt-3 btn btn-secondary">Ajouter une facture</button></a>
    </div>

        <thead>
            <th>Id</th>
            <th>Date</th>
            <th>Prix HT</th>
            <th>Prix TTC</th>
            <th>Client</th>
            <th>Personnel</th>
            
        </thead>
        <?php  foreach($factures as $u ): ?>
        <tr>
            <td><?= $u->id ?></td>
            <td><?=$u->date?></td>
            <td><?=$u->prix_ht?></td>
            <td><?=$u->prix_ttc?></td>
            <td><?=$u->client_prenom?> <?=$u->client_nom?></td>
            <td><?=$u->personnel_nom?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>       