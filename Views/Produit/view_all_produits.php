<?php
// include('./Utils/header_admin.php');
// var_dump($produits);
?>
<div class="table-responsive">
    
    <table id='table' class="table w-75 mx-auto">
    <h2 class="text-center">Liste des produits</h2>

    <!-- Bandeau d'alerte si alerte stock atteinte -->
    <?php  foreach($produits as $u ): ?>
      <?php echo ($u->stock <= $u->alerte) ? '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Attention !</strong> Alerte stock sur le produit <em>'.$u->name.'</em>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      ' : '' ?>
    <?php endforeach; ?>

    

    <?php
    if(isset($_SESSION["roles"]) && $_SESSION["roles"]=="admin")  
      {echo '
        <div class="align-self-end">
        <a href="?controller=produit&action=produit_add"><button class="mt-3 btn btn-secondary">Ajouter un produit</button></a>
        </div>
        ';} 
      ?>
   <!-- ---------------------------- bandeau d'alerte ---------------------------- -->
    

        <thead>
            <th>Id</th>
            <th>Nom</th>
            <th>Référence</th>
            <th>Prix HT</th>
            <th>Prix TTC</th>
            <th>Taux TVA</th>
            <th>Stock</th>
            <th>Alerte</th>
            <?php
            if(isset($_SESSION["roles"]) && $_SESSION["roles"]=="admin")  
              {echo '
            <th>Action</th>
            ';}
            ?>
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
            <?php
            if(isset($_SESSION["roles"]) && $_SESSION["roles"]=="admin")  
              {echo '
                <td>
                  <div class="d-flex flex-row">
                      <form action="?controller=produit&action=produit_update" method="POST">
                          <input type="hidden" name="produit_id" class="form-control" id="hide1" value='. $u->id .' >
                          <button type="submit" class="btn btn-primary btn-sm me-3"><i class="fa-regular fa-pen-to-square"></i></button>
                      </form>
                      <form action="?controller=produit&action=produit_delete" method="POST" id="theme_delete_form">
                          <input type="hidden" name="produit_id" class="form-control" id="hide2" value='. $u->id .' >
                          <button type="submit" class="btn btn-danger btn-sm delete-button"><i class="fa-regular fa-trash-can"></i></button>
                      </form>
                  </div>
                </td>'
              ;}
              ?>
        </tr>
        <?php endforeach; ?>
    </table>
</div>       