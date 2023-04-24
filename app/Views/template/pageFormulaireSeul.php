<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $meta_title ?></title>
          <link rel="icon" type="image/x-icon" href="<?=base_url('assets/images/favitok.svg')?>">

          <link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css">
          <link href="<?=base_url('assets/css/main.css')?>" rel="stylesheet" type="text/css">

            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=B612:ital,wght@0,700;1,400&display=swap" rel="stylesheet">

            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    </head>

<div class="container-fluid" style="background-color: #F6F4EA;">

  <!-- titre de la page partager une gloutonnerie -->
  <div class="row">
      <div class="d-flex justify-content-center my-3">
          <img src="<?=base_url('assets/images/logo2.svg')?>" alt="homme qui cuisine" class="figure-img img-fluid me-3" style="width:50px;" >
          <h3><? $title ?></h3>
          <img src="<?=base_url('assets/images/logo2.svg')?>" alt="homme qui cuisine" class="figure-img img-fluid ms-3" style="width:50px;" >
      </div>
  </div>

  <!-- début du formulaire -->
  <div class="col-12 col-md-10 mx-auto">
    <?= form_open_multipart('formulaireSeul');?>

    <!--Choix de la catégorie et sous catégorie -->
        <div class="row d-flex justify-content-center mb-3" style="background-color: #FEFAE0;">
            <!-- <div class="col-2 mt-5 formulaire-etape ">
                <span class="fs-3 align-self-center">1</span>
            </div> -->
          <div class="col-2 mt-3 text-end d-none d-sm-block">
          <img src="<?=base_url('assets/images/louche.svg')?>" alt="ustensile de cuisine" class="figure-img img-fluid ms-3" style="height:90px;" >
          </div>

          <div class="col-12 col-md-6 mt-3">
            <select class="form-select form-select-sm mb-4" name ="categorie_id" aria-label=".form-select-sm example" onchange="selectSousCat(this)">
              <option selected>Choisir une catégorie</option>
              <?php foreach ($categories as $rowCat) : ?>
              <option value="<?= $rowCat["id"]?>"><?= $rowCat["nom_categorie"]?>
              <?php endforeach; ?>
            </select>

            <select id="sousCatList" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="sousCategorie_id" >
              <option selected >Choisir une Sous catégorie</option>
            </select>
          </div>
        </div>

    <!-- nom de la recette -->
        <div class="row d-flex justify-content-center mb-3" style="background-color: #FEF6E0;">
            <!-- <div class="col-2 mt-4 formulaire-etape ">
                <span class="fs-3 align-self-center">2</span>
            </div> -->
            <div class="col-2 text-end align-self-center d-none d-sm-block">
                <img src="<?=base_url('assets/images/plat3.png')?>" alt="plat" class="figure-img img-fluid ms-3"  style="height:40px;" >
            </div>
            <div class=" col-12 col-md-6 my-3">
                 <input class="form-control" type="text" placeholder="nom de la recette" aria-label="defaultinput" name="nom">
             </div>
        </div>

    <!-- Drescription de la recette -->
        <div class="row d-flex justify-content-center mb-3" style="background-color: #FEFAE0;">
            <!-- <div class="col-6 col-md-4 col-lg-2 mt-4 formulaire-etape">
                <span class="fs-3 align-self-center">3</span>
            </div> -->
            <div class="col-12 col-md-6 ">
                <p>Décrire en une phrase ou deux, la recette.</p>
                <textarea class="form-control mb-3" rows="2" name="description" placeholder=""></textarea>
            </div>
            <div class="col-6 col-md-2 align-self-end d-none d-sm-block">
                <img src="<?=base_url('assets/images/fourchette.png')?>" alt="fourchette" class="figure-img img-fluid" style="width: 135px;">
            </div>
        </div>
    
    <!-- champs pour la durée, le nbre de part et la difficulté -->
        <div class="row d-flex justify-content-evenly mb-3" style="background-color: #FEF6E0;">
            <!-- <div class="col-1 mt-4 formulaire-etape">
                <span class="fs-3 align-self-center">4</span>
            </div> -->
            <div class="col-12 col-md-3 col-lg-3 d-flex flex-column">
                <i class="bi bi-hourglass-split fs-2"></i>
                <input class="form-control mb-3" type="text" placeholder="durée" aria-label="defaultinput" name="duree">
            </div>
            <div class="col-12 col-md-3 col-lg-3 d-flex flex-column">
            <i class="bi bi-people fs-2"></i>
            <input class="form-control mb-3" type="text" placeholder="nombre de part" aria-label="defaultinput" name="nbPart">
            </div>
            <div class="col-12 col-md-3 col-lg-3 d-flex flex-column">
                <i class="bi bi-speedometer2 fs-2"></i>
                <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="difficulte">
                    <option selected>Difficulté</option>
                    <option value="1">Facile</option>
                    <option value="2">Adaptée</option>
                    <option value="3">Complexe</option>
                </select>
            </div>
        </div>

    <!--champs pour les ingrédients -->
        <div class="row d-flex justify-content-center mb-3" style="background-color: #FEFAE0;">
          <div class="col-2 mt-2 text-end d-none d-sm-block">
          <img src="<?=base_url('assets/images/rape1.svg')?>" alt="ustensile cuisine" class="figure-img img-fluid ms-3" style="width:50px;" >
          </div>
          <div class="col-12 col-md-6 mt-3">
            <input type="text" class="form-control" placeholder="ingrédients" id="ingredient" aria-label="nomIngredient" aria-describedby="defaultinput">
            <span class="d-flex justify-content-end mt-2">
              <div>Ajouter un ingrédient <button onclick="nouvelIngr()" class="btn btn-outline-success" type="button" id="btnIngr"><i class="bi-plus-circle"></i></button>
              </div>
            </span>
          </div>
          <!-- champs javascript pour ingrédient -->
          <div class="col-10 col-md-6 mb-3 d-flex justify-content-center" id="ingrDiv">
            <ul class="list-group list-group-flush" id="ulIngr">
            </ul>
          </div>
        </div>

    <!-- champs pour les étapes -->
        <div class="row d-flex justify-content-center mb-3" style="background-color: #FEF6E0;">
          <div class="col-2 text-end align-self-center d-none d-sm-block">
            <img src="<?=base_url('assets/images/rouleau1.svg')?>" alt="rouleau" class="figure-img img-fluid ms-3" style="height:80px;" >
          </div>
          <div class="col-12 col-md-6 mt-3">
            <textarea class="form-control mb-3" id="etapeRecette" rows="4" placeholder="Etapes de la recette"></textarea>
            <span class="d-flex justify-content-end mb-3">
              <div>Ajouter une étape<button onclick="nouvelEtape()" class="btn btn-outline-success ms-2" type="button" id="btnEtape"><i class="bi-plus-circle"></i></button>
              </div>
            </span>
            <!-- champs javascript pour les étapes -->
            <div class="" id="etapeDiv">
              <ul class="list-group list-group-flush" id="ulEtape">
              </ul>
            </div>
          </div>
        </div>

    <!-- row pour la selection de l'image -->
    <div class="row d-flex justify-content-evenly mb-3" style="background-color: #FEFAE0;">
        <div class="col-2 mt-3 text-end d-none d-sm-block">
          <img src="<?=base_url('assets/images/saliere.svg')?>" alt="ustensile de cuisine" class="figure-img img-fluid ms-3" style="height:90px;" >
        </div>
        <div class="col-12 col-md-5 col-lg-4 mt-3">
          <?= form_label('Choisir une image d\'illustration', 'image');?>
          <?= form_upload('image', '', ['id' => 'image', 'class'=>'form-control border-warning', 'type'=>'file']);?>
        </div>
        <!-- insertion de la div pour l'image de l'upload en javascipt-->
        <div id="insert_image" class="col-6 col-md-4 col-lg-4 mt-3" style="height: 150px;">
        </div>
    </div>

    <!-- row pour la selection des tags -->
    <div class="row d-flex justify-content-evenly g-3 my-3" style="background-color: #FEF6E0;">
      <h5 class="text-center">Choisir les tags (optionnel)</h5>

      <div class="cardOccasion col-12 col-md-6 col-lg-4 my-3 mx-4" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Evénement / Occasion</h5>
          <h6 class="card-subtitle mb-3 text-muted">En relation avec la temporalité</h6>
          <?php foreach($tagsOccasion as $rowTagsOccasion) : ?>
            <span class="tagsOccasion badge rounded-pill my-1 mx-1">
              <p class="tagsOccasion fs-6">
                <?= $rowTagsOccasion["nom_tags"] ?>
                <input class="form-check-input mt-0" type="checkbox" name="tagsEnvoi[]" value="<?= $rowTagsOccasion["id"] ?>">
              </p>
            </span>
          <?php endforeach ?>
        </div>
      </div>

      <div class="cardIngredient col-12 col-md-6 col-lg-4 my-3" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Ingrédients</h5>
          <h6 class="card-subtitle mb-2 text-muted">En relation avec les ingrédients</h6>
          <?php foreach($tagsIngr as $rowTagsIngr) : ?>
            <span class="tagsIngredient badge rounded-pill my-1 mx-1">
              <p class="tagsIngredient fs-6">
                <?= $rowTagsIngr["nom_tags"] ?>
                <input class="form-check-input mt-0" type="checkbox" name="tagsEnvoi[]" value="<?= $rowTagsIngr["id"] ?>">
              </p>
            </span>
          <?php endforeach ?>
        </div>
      </div>    

      <div class="cardDivers col-12 col-md-6 col-lg-4 my-3 mx-4" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Divers</h5>
          <h6 class="card-subtitle mb-2 text-muted">Tout le reste</h6>
          <?php foreach($tagsDivers as $rowTagsDivers) : ?>
            <span class="tagsDivers badge rounded-pill my-1 mx-1">
              <p class="tagsDivers fs-6">
                <?= $rowTagsDivers["nom_tags"] ?>
                <input class="form-check-input mt-0" type="checkbox" name="tagsEnvoi[]" value="<?= $rowTagsDivers["id"] ?>">
              </p>
            </span>
          <?php endforeach ?>
        </div>
      </div>

    </div>

  

      <!-- input caché pour les étapes et les infredients -->
      <input id="ingrId" name="ingredient" type="hidden" value="">
      <input id="etapeId" name="etape" type="hidden" value="">

      <!-- input caché pour récupérer id utilisateur -->
      <input name="utilisateur_id" type="hidden" value="2">


    <!-- bonton submit -->
      <button onclick="enregistrer()" class="btn btn-primary mb-3" type="submit">Envoyer</button>

      <!-- fermeture du formulaire -->
    <?= form_close();?> 
  </div>
</div>

<script>
    const sousCat = <?php echo(json_encode($sousCategories)) ?>;
  </script>
  <script src="<?=base_url('assets/js/formulaire.js')?>"></script>

  <script src="<?=base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
    <script src="<?=base_url('assets/js/popper.min.js')?>"></script>
  </body>
</html>

