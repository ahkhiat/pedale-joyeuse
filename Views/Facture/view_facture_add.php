
<div class="mx-auto w-50" id="facture_container">
<?php
// var_dump($clients);
// var_dump($personnels);
// var_dump($produits);
?>

<h2>Ajouter une facture</h2>

<form action="?controller=client&action=facture_add_request" method="POST">

  <div class="mb-3">
    <label for="nom" class="form-label">Date</label>
    <input type="date" class="form-control" id="date"  name="date" >
  </div>
  <div class="mb-3">
    <label for="personnel" class="form-label">Personnel</label>
    <select class="form-select" name="personnel">
        <option selected>Choix du personnel</option>
        <?php  foreach($personnels as $p ): ?>
        <option value="<?=$p->id?>"> <?= $p->prenom?> <?php str_repeat('&nbsp;', 1) ?><?=$p->nom?></option>
        <?php endforeach; ?>
    </select>  
  </div>
  <div class="mb-3">
    <label for="client" class="form-label">Client</label>
    <select class="form-select" name="personnel">
        <option selected>Choix du client</option>
        <?php  foreach($clients as $c ): ?>
        <option value="<?=$c->id?>"><?= $c->prenom?> <?php str_repeat('&nbsp;', 1) ?> <?=$c->nom?></option>
        <?php endforeach; ?>
    </select>   </div>
  <!-- <div class="mb-3">
    <label for="ligne_facture" class="form-label">Ligne facture </label>
    <input type="text" class="form-control" id="ligne_facture"  name="ligne_facture" >
  </div> -->

  <button type="button" class="btn btn-outline-primary btn-sm" id="btn_ajout_ligne">Ajouter une ligne</button>
  <div class="mb-3" id="lignes_facture_container">
    
  </div>
  
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>

<script src="./Content/js/facture.js"></script>