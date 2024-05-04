<?php
// var_dump($tva);
// var_dump($produit);
?>
<div class="mx-auto w-50">

<h2>Modifier un produit</h2>


<form action="?controller=produit&action=produit_update_request" method="POST">

  <div class="mb-3">
    <label for="name" class="form-label">Nom</label>
    <input type="text" class="form-control" id="name"  name="name" value="<?php echo $produit[0]->name ?>">
  </div>
  <div class="mb-3">
    <label for="reference" class="form-label">Référence</label>
    <input type="text" class="form-control" id="reference"  name="reference" value="<?php echo $produit[0]->reference ?>">
  </div>
  <div class="mb-3">
    <label for="price_ht" class="form-label">Prix H.T.</label>
    <input type="text" class="form-control" id="price_ht"  name="price_ht" value="<?php echo $produit[0]->price_ht ?>">
  </div>
  <div class="mb-3">
    <label for="stock" class="form-label">Stock</label>
    <input type="text" class="form-control" id="stock"  name="stock" value="<?php echo $produit[0]->stock ?>">
  </div>
  <div class="mb-3">
    <label for="alerte" class="form-label">Alerte stock</label>
    <input type="text" class="form-control" id="alerte"  name="alerte" value="<?php echo $produit[0]->alerte ?>">
  </div>
  
  <div class="mb-3">
    <label for="id_tva" class="form-label">TVA</label>
    <select class="form-select" name="id_tva">
        <option selected>Choix du taux</option>
        <?php  foreach($tva as $t ): ?>
            <option value="<?= $t->id ?>" <?php echo ($t->taux == $produit[0]->taux) ? 'selected' : '' ?>>
                <?= $t->taux ?>
            </option>        
        <?php endforeach; ?>
    </select>   
   </div>
   <input type="hidden" class="form-control" id="id"  name="id" value="<?php echo $produit[0]->id ?>" >

  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>