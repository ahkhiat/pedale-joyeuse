<?php
// include('./Utils/header_admin.php');
// var_dump($produits);
?>
<div class="table-responsive">
    
    <table id='table' class="table w-75 mx-auto">
    <h2 class="text-center">Liste des produits</h2>

    <?php
    if(isset($_SESSION["roles"]) && $_SESSION["roles"]=="admin")  
      {echo '
        <div class="align-self-end">
        <a href="?controller=produit&action=produit_add"><button class="mt-3 btn btn-secondary">Ajouter un produit</button></a>
        </div>
        ';} 
      ?>
   

        <thead>
            <th>Id</th>
            <th>Nom</th>
            <th>Référence</th>
            <th>Prix HT</th>
            <th>Prix TTC</th>
            <th>Taux TVA</th>
            <th>Stock</th>
            <th>Alerte</th>
            
        </thead>
        <?php  foreach($produits as $u ): ?>
        <tr>
            <td><?= $u->id ?></td>
            <td><?=$u->name?></td>
            <td><?=$u->reference?></td>
            <td><?=$u->price_ht?></td>
            <td><?=$u->price_ttc?></td>
            <td><?=$u->taux?></td>
            <td style="<?php echo ($u->stock <= $u->alerte) ? 'color: red; font-weight: bold;' : '' ?>"><?=$u->stock?></td>
            <td><?=$u->alerte?> </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>       