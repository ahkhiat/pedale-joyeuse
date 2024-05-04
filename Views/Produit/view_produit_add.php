<?php
var_dump($tva);
?>
<div class="mx-auto w-50">

<h2>Ajouter un produit</h2>


<form action="?controller=produit&action=produit_add_request" method="POST">

  <div class="mb-3">
    <label for="name" class="form-label">Nom</label>
    <input type="text" class="form-control" id="name"  name="name" >
  </div>
  <div class="mb-3">
    <label for="reference" class="form-label">Référence</label>
    <input type="text" class="form-control" id="reference"  name="reference" >
  </div>
  <div class="mb-3">
    <label for="price_ht" class="form-label">Prix H.T.</label>
    <input type="text" class="form-control" id="price_ht"  name="price_ht" >
  </div>
  <div class="mb-3">
    <label for="stock" class="form-label">Stock</label>
    <input type="text" class="form-control" id="stock"  name="stock" >
  </div>
  <div class="mb-3">
    <label for="alerte" class="form-label">Alerte stock</label>
    <input type="text" class="form-control" id="alerte"  name="alerte" >
  </div>
  
  <div class="mb-3">
    <label for="id_tva" class="form-label">TVA</label>
    <select class="form-select" name="id_tva">
        <option selected>Choix du taux</option>
        <?php  foreach($tva as $t ): ?>
        <option value="<?=$t->id?>"><?= $t->taux?></option>
        <?php endforeach; ?>
    </select>   </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>