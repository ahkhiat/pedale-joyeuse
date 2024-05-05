<?php
// var_dump($facture);
// var_dump($lignes);
?>
<div class="page-content container">
    <div class="page-header text-blue-d2">
        <h1 class="page-title text-secondary-d1">
            Facture
            <small class="page-info">
                <i class="fa fa-angle-double-right text-80"></i>
                <?= $facture[0]->id ?>
            </small>
        </h1>

        <div class="page-tools">
            <div class="action-buttons">
                <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print">
                    <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                    Print
                </a>
                <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="PDF">
                    <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                    Export
                </a>
            </div>
        </div>
    </div>

    <div class="container px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-8 border">
                        <div class=" text-150">
							<img src="./Content/img/pedalejoyeuse.png" alt="" class="src" width="300">
                        </div>
						
                    </div>
					<div class="col-4 border text-sm text-grey-m2 align-middle d-flex flex-column justify-content-end align-items-end">
						<div>18 rue de la République</div>
						<div>13002 Marseille</div>
						<div><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> 04912345678 </div>
						<div>contact@pedale-joyeuse.fr</div>
						
						


					</div>
                </div>
                <!-- .row -->

                <hr class="row brc-default-l1 mx-n1 mb-4" />

                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">Client :</span>
                        </div>
                        <div>
                            <span class="text-600 text-110 text-blue align-middle"><?= $facture[0]->client_prenom . " " .$facture[0]->client_nom?> </span>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1">
								<?= $facture[0]->adresse1 ?>                            
							</div>
                            <div class="my-1">
								<?= $facture[0]->adresse2 ?> 
							</div>
                            <div class="my-1">
								<?= $facture[0]->code_postal . " " . $facture[0]->ville ?> 
							</div>
                            <div class="my-1">
								<i class="fa fa-phone fa-flip-horizontal text-secondary"></i> 
								<strong>
									<?= $facture[0]->telephone ?>
								</strong>
							</div>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                Facture
                            </div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID : </span><?= $facture[0]->id ?></div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Date:</span> <?= date('d/m/Y', strtotime($facture[0]->date)) ?></div>

                            <!-- <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <span class="badge badge-warning badge-pill px-25">Unpaid</span></div> -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

                <div class="mt-4">
                    <div class="row text-600 text-white bgc-default-tp1 py-25">
                        <div class="d-none d-sm-block col-1">#</div>
                        <div class="col-9 col-sm-5">Description</div>
                        <div class="d-none d-sm-block col-4 col-sm-2">Qté</div>
                        <div class="d-none d-sm-block col-sm-2">P.U. H.T</div>
                        <div class="col-2">Total H.T.</div>
                    </div>

                    <div class="text-95 text-secondary-d3">
						<?php  
						$i = 1;
						foreach($lignes as $u ): ?>

                        <div class="row mb-2 mb-sm-0 py-25">
                            <div class="d-none d-sm-block col-1"><?= $i ?></div>
                            <div class="col-9 col-sm-5"><?= $u->name ?></div>
                            <div class="d-none d-sm-block col-2"><?= $u->quantite ?></div>
                            <div class="d-none d-sm-block col-2 text-95"><?= $u->price_ht ?> €</div>
                            <div class="col-2 text-secondary-d2"><?= $u->total_ht ?> €</div>
                        </div>
						<?php 
						$i++;
						endforeach; ?>

							

                        
                    </div>

                    <div class="row border-b-2 brc-default-l2"></div>

                    <!-- or use a table instead -->
                    
            <!-- <div class="table-responsive">
                <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                    <thead class="bg-none bgc-default-tp1">
                        <tr class="text-white">
                            <th class="opacity-2">#</th>
                            <th>Description</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th width="140">Amount</th>
                        </tr>
                    </thead>

                    <tbody class="text-95 text-secondary-d3">
                        <tr></tr>
                        <tr>
                            <td>1</td>
                            <td>Domain registration</td>
                            <td>2</td>
                            <td class="text-95">$10</td>
                            <td class="text-secondary-d2">$20</td>
                        </tr> 
                    </tbody>
                </table>
            </div> -->
           

                    <div class="row mt-3">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
							La présente facture est à regler au maximum pour le <?= date('d/m/Y', strtotime($facture[0]->date . ' +1 month')) ?>
					</div>

                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    Sous-total
                                </div>
                                <div class="col-5">
                                    <span class="text-120 text-secondary-d1"><?= $facture[0]->prix_ht ?> €</span>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    TVA 
                                </div>
                                <div class="col-5">
                                    <span class="text-110 text-secondary-d1"><?= $facture[0]->total_tva ?> €</span>
                                </div>
                            </div>

                            <div class="row my-2 align-items-center bgc-primary-l3 border ">
                                <div class="col-7 text-right">
                                    Total T.T.C.
                                </div>
                                <div class="col-5 border text-bg-light">
                                    <strong><span class="text-150 text-success-d3 opacity-2"><?= $facture[0]->prix_ttc ?> €</span></strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div>
                        <!-- <span class="text-secondary-d1 text-105">Thank you for your business</span>
                        <a href="#" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0">Pay Now</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>