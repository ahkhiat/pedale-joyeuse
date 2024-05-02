<div class="mx-auto w-50">

<h2>Ajouter un client</h2>


<form action="?controller=client&action=client_add_request" method="POST">

  <div class="mb-3">
    <label for="nom" class="form-label">Nom</label>
    <input type="text" class="form-control" id="nom"  name="nom" >
  </div>
  <div class="mb-3">
    <label for="prenom" class="form-label">Prénom</label>
    <input type="text" class="form-control" id="prenom"  name="prenom" >
  </div>
  <div class="mb-3">
    <label for="adresse1" class="form-label">Adresse</label>
    <input type="text" class="form-control" id="adresse1"  name="adresse1" >
  </div>
  <div class="mb-3">
    <label for="adresse2" class="form-label">Complément d'adresse</label>
    <input type="text" class="form-control" id="adresse2"  name="adresse2" >
  </div>
  <div class="mb-3">
    <label for="code_postal" class="form-label">Code postal</label>
    <input type="text" class="form-control" id="code_postal"  name="code_postal" >
  </div>
  <div class="mb-3">
    <label for="ville" class="form-label">Ville</label>
    <input type="text" class="form-control" id="ville"  name="ville" >
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control" id="email"  name="email" >
  </div>
  <div class="mb-3">
    <label for="telephone" class="form-label">Téléphone</label>
    <input type="text" class="form-control" id="telephone"  name="telephone" >
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>