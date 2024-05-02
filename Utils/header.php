<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" href="./Content/img/favicon.ico" type="image/x-icon">

  <!-- ------------------------------- stylesheets ------------------------------ -->
  <link rel="stylesheet" href="./Content/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="Content/css/styles_home.css">

  <!-- ------------------------------- libraries scripts  ------------------------------ -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/29aef3fc25.js" crossorigin="anonymous"></script>

  <!-- ---------------------------------icons---------------------------------------- -->
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

  <!-- --------------------------------fonts-------------------------------------------- -->
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">


  <!-- ------------------------------- scripts ------------------------------ -->
  <script type="module" src="./Content/js/script.js" defer></script>



  <title>La Pédale Joyeuse !</title>
</head>

<body>
  <header>

    <!-- -------------------------Navbar Bootstrap---------------------------------------- -->


    <nav class="navbar navbar-expand-lg bg-light navbar-main" id="navbar_main">

      <div class="container-fluid">

        <div>
          <a href="?controller=home&action=home" class="href"><img class="logo" src="./Content/img/logo.webp" alt="logo.webp"></a>
        </div>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <ul class="navbar-nav ms-5 me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a href="?controller=client&action=all_clients" class="nav-link text-light">Clients</a>
            </li>
            <li class="nav-item">
              <a href="?controller=facture&action=all_factures" class="nav-link text-light">Factures</a>
            </li>
            <li class="nav-item">
              <a href="?controller=produit&action=all_produits" class="nav-link text-light">Produits</a>
            </li>
          </ul>

        </div>



      </div>

    </nav>


  </header>
</body>

</html>