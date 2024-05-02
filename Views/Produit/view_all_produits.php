<?php
// include('./Utils/header_admin.php');
// var_dump($factures);
?>
<div class="table-responsive">
    
    <table id='table' class="table w-75 mx-auto">
    <h2 class="text-center">Liste des produits</h2>

    <!-- <div class="align-self-end">
        <a href="?controller=facture&action=facture_add"><button class="mt-3 btn btn-secondary">Ajouter une facture</button></a>
    </div> -->

        <thead>
            <th>Id</th>
            <th>Nom</th>
            <th>Référence</th>
            <th>Prix HT</th>
            <th>Stock</th>
            
        </thead>
        <?php  foreach($produits as $u ): ?>
        <tr>
            <td><?= $u->id ?></td>
            <td><?=$u->name?></td>
            <td><?=$u->reference?></td>
            <td><?=$u->price_ht?></td>
            <td><?=$u->stock?> </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>       