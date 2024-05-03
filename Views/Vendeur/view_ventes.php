<?php
// include('./Utils/header_admin.php');
// var_dump($factures);
// var_dump($totaux);
?>
<div class="table-responsive">
    
    <table id='table' class="table w-75 mx-auto">
    <h2 class="text-center">
        <?= $titre?>
    </h2>

    <div class="badge-nom text-center text-success fw-bold mb-5"> <?php if(isset($_SESSION)){echo $_SESSION['prenom'].str_repeat('&nbsp;', 1).$_SESSION['nom'];}?></div>
                <div class="d-flex justify-content-between w-75 mx-auto">
                    <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Nombre de ventes</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $nbr_ventes ?></div>
                                        </div>
                                        <div class="col-auto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total H.T</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totaux[0]->total_ht ?></div>
                                        </div>
                                        <div class="col-auto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total T.T.C.</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totaux[0]->total_ttc ?></div>
                                        </div>
                                        <div class="col-auto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

        <thead>
            <th>Id</th>
            <th>Date</th>
            <th>Prix HT</th>
            <th>Prix TTC</th>
            <th>Client</th>
            <th>Personnel</th>
            
        </thead>
        <?php  foreach($ventes as $u ): ?>
        <tr>
            <td><?= $u->id ?></td>
            <td><?=$u->date?></td>
            <td><?=$u->prix_ht?></td>
            <td><?=$u->prix_ttc?></td>
            <td><?=$u->client_prenom?> <?=$u->client_nom?></td>
            <td><?=$u->user_prenom?> <?=$u->user_nom?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>       