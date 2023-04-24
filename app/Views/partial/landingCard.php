<div class="container-fluid my-3">
  <div class="row">
    <div class="col-12 col-md-12 col-lg-10 my-3 mx-auto">
      <div class="card">
          <div class="card-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="recette-tab" data-bs-toggle="tab" data-bs-target="#recette-tab-pane" type="button" role="tab" aria-controls="recette-tab-pane" aria-selected="true">Recette</button>
                        </li>
                    <li class="nav-item" role="presentation">
                    <button class="nav-link" id="commentaire-tab" data-bs-toggle="tab" data-bs-target="#commentaire-tab-pane" type="button" role="tab" aria-controls="commentaire-tab-pane" aria-selected="false">Commentaire (0)</button>
                    </li>
                </ul>

            <div class="tab-content" id="myTabContent">
                <!-- debut card recette -->
                <div class="tab-pane fade show active"  id="recette-tab-pane"role="tabpanel" aria-labelledby="recette-tab" tabindex="0">
                C'est les recettes ici
                  <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-4" style="background-color: #FEFAE0;">
                            <div class="card-title border-bottom border-success my-3">
                                <h4 class="card-title"><?= $cardAccueil["nom"] ?></h4>
                            </div>
                            <div class="card-decrit mb-5">
                                <p class="fst-italic"><?= $cardAccueil["description"] ?></p>
                            </div>
                            
                          <div class="mb-3">
                            <div class="d-inline-flex p-2"> <h5 class="fiche-ingredient align-self-end me-2">Ingrédients</h5><img src="<?= base_url('assets/images/ingredients.png')?>" alt="ingredient illustration" class="figure-img img-fluid" style="width:40px;"></div>
        
                            <!-- insertion de la liste d'ingrédient en javascript -->
                            <ul class="card-ingredient list-group list-group-flush" id="ingrListe">
                            </ul>
                          </div>
                        </div>

                        <div class="col-12 col-md-8" style="background-color: #FEFAE0;">
                            <div class="mt-3">
                            <img src="<?= base_url('uploads/'.$cardAccueil["image"])?>" alt="plat illustration" class="figure-img img-fluid ratio mx-auto rounded-2 border border-2 border-success" style="background-color: #FEFAE0;">
                            </div>
                            <!-- difficulté, duréée , nbre de part -->
                            <div class="d-flex justify-content-evenly text-center mb-3">
                                <div class="col-5 col-md-4 col-lg-3 border-end border-success"><i class="bi bi-bar-chart me-2"></i>
                                    <?php 
                                        if($cardAccueil["difficulte"]==1){
                                        echo "facile";
                                        }
                                        elseif($cardAccueil["difficulte"]==2){
                                            echo "adaptée";
                                        }else{
                                            echo "compliqué";
                                        }
                                        ?>         
                                </div>
                                <div class="col-4 col-md-4 col-lg-2 border-end border-success"><i class="bi bi-alarm me-2"></i><?= $cardAccueil["duree"].' min.'?>
                                </div>
                                <div class="col-3 col-md-4 col-lg-2"><i class="bi bi-people me-2"></i><?= $cardAccueil["nbPart"].' pers.' ?>
                                </div>
                            </div>
                        </div>                  
                    </div>

                    <div class="row mt-3">
                        <div class="card-etapes" style="background-color: #FAECDC;" >
                            <div class="d-inline-flex p-2"> <h5 class="me-2 align-self-end fiche-etape">Les étapes</h5><img src="<?= base_url('assets/images/ingredients2.png')?>" alt="ingredient illustration" class="figure-img img-fluid" style="width:50px;">
                            </div>
                      
                            <!-- div pour afficher la liste des étapes en javascript -->
                            <div class="mt-4" id="etapeListe">
                            </div>

                        </div>
                    </div>
                  </div>
                </div>
                <!-- partie commentaire -->
                <div class="tab-pane fade" id="commentaire-tab-pane" role="tabpanel" aria-labelledby="commentaire-tab" tabindex="0">
                c'est les commentaires ici
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <a href="<?=base_url('login')?>"><button type="button" class="btn btn-outline-success fw-bold mt-2">Ajouter une recette</button></a>
    </div>
  </div>
</div>

<script>
  const recette = <?php echo json_encode($cardAccueil) ?>;
</script>

<script src="<?= base_url('assets/js/recupRecette.js') ?>"></script>