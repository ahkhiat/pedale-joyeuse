<?php
// include('./Utils/header_admin.php');
// var_dump($factures);
include('./Utils/header_admin.php')

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
            <th>Action</th>
            
        </thead>
        <?php  foreach($factures as $u ): ?>
        <tr>
            <td><?= $u->id ?></td>
            <td><?=$u->date?></td>
            <td><?=$u->prix_ht?></td>
            <td><?=$u->prix_ttc?></td>
            <td><?=$u->client_prenom?> <?=$u->client_nom?></td>
            <td><?=$u->user_prenom?> <?=$u->user_nom?></td>
            <td>
                <div class="d-flex flex-row">
                    <form action="?controller=facture&action=facture_show" method="POST">
                        <input type="hidden" name="fid" class="form-control" id="hide" value=<?= $u->id ?>>
                        <button type="submit" class="btn btn-primary btn-sm me-3"><i class="fa-regular fa-pen-to-square"></i></button>
                    </form>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>       