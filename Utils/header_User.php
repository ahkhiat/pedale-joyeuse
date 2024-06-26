<ul class="navbar-nav ms-5 me-auto mb-2 mb-lg-0">


  <li class="nav-item">
    <a href="?controller=produit&action=all_produits" class="nav-link "><button class="btn btn-secondary">Stocks</button></a>
  </li>
  <li class="nav-item">
    <a href="?controller=vendeur&action=dashboard" class="nav-link "><button class="btn btn-secondary">Ventes</button></a>
  </li>
  <li class="nav-item">
    <a href="?controller=client&action=client_add" class="nav-link "><button class="btn btn-secondary">Ajouter un client</button></a>
  </li>
  <li class="nav-item">
    <a href="?controller=facture&action=facture_add" class="nav-link "><button class="btn btn-success">Ajouter une facture</button></a>
  </li>




</ul>

<ul class="navbar-nav me-auto">

  <?php // ---------------------Display dashboard if user is ADMIN --------------------
  if (isset($_SESSION['email']) && $_SESSION['roles'] == 'admin') {
    echo
    '
                <li class="nav-item">
                  <a href="?controller=admin&action=dashboard_admin" class="nav-link text-secondary">Dashboard</a>
                </li>
                    ';
  }
  ?>
</ul>

<!--------------------------- User badge and dropdown menu ------------------------>
<ul class="navbar-nav me-2 mb-2 mb-lg-0 align-items-center">
  <li class="nav-item">
    <?php    // ------------ Display if user is ADMIN -------------------
    if (isset($_SESSION["roles"]) && $_SESSION["roles"] == "admin") {
      echo "<a class='nav-link text-danger' id='admin'><span class='btn btn-outline-secondary rounded-pill disabled'>Mode Manager</span></a>";
    } else {
      echo "<a class='nav-link text-danger' id='admin'><span class='btn btn-outline-secondary rounded-pill disabled'>Mode Vendeur</span></a>";
    }
    ?>
  </li>
  <li class="nav-item dropdown ">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">

      <!-- <div class="user-badge"> <?= $_SESSION["prenom"] ?> </div> -->
      <!-- en cours -->
      <?php
      if (isset($_SESSION['image_name'])) {
        echo '
        <img src="Public/img/' . $_SESSION["image_name"] . '" width=125 height=125 alt="" title="' . $_SESSION["image_name"] . '" class="pp-navbar">
        ';
      } else {
        echo '
        <div class="user-badge"><strong>' . strtoupper(substr($_SESSION["prenom"], 0, 1)) . '</strong></div>
        ';
      }

      ?>
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
      <li>
        <p class=" text-muted fs-6 ms-3"><?= $_SESSION['prenom'] . str_repeat('&nbsp;', 1) . $_SESSION['nom']; ?></p>
      </li>
      <li>
        <hr class="dropdown-divider">

        <hr class="dropdown-divider">
      </li>
      <li><a class="dropdown-item" href="?controller=security&action=disconnection">Deconnexion</a></li>
    </ul>
  </li>
</ul>