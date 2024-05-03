<div class="container-fluid">

    <h2 class="text-center">
        <?= $titre ?>
    </h2>

    <div class="badge-nom text-center text-success fw-bold mb-5"> <?php if(isset($_SESSION)){echo $_SESSION['prenom'].str_repeat('&nbsp;', 1).$_SESSION['nom'];}?></div>
    

    <!-- Row 1 -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-1">
                <div class="card-header"><a href="?controller=vendeur&action=ventes_mois">Ventes du mois</a></div>
                <div class="card-body">
                    <div class="row no-gutters align-items-center ">
                        <div class="col mr-2 ">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </div>
                        <div class="col-auto ">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $nbr_ventes ?> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-header">Vente cumulées depuis 1er janvier</div>
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <div class="col-auto">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $ytd_ventes ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Row 2 -->
    <div class="row">

    </div>


    <!-- Action Container -->
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
           
        </div>
    </div>




<!-- End Container fluid -->
</div>
