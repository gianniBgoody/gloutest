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

  <body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light px-5 py-2" style="background-color: #FAECDC;">
	    <div class="container-fluid">
		    <a class="navbar-brand" style="color: #542B20" href="<?= base_url('land')?>">
			  <img src="<?=base_url('assets/images/logo.svg')?>" id= "logo" alt="logo" width="70" class="d-inline-block align-text-center"></a>
    			<ul class="navbar-nav">
            <li class="nav-item fw-semibold" style="color: #542B20">
              <span><h6 id="logo-text" class="">GLOUTONNADE</h6></span> 
                <ul class="navbar-nav">
                  <li class="nav-item fw-light"><h6 class=""><small>l'adresse qui régale</small></h6></li>
                </ul>
            </li>
          </ul>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
    
        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="true" style="color: #542B20">Recettes</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="<?= base_url('session')?>">Toutes les recettes</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('tag/6')?>">A l'exterieur</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('iodées')?>">recettes iodées</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('sucrées')?>">recettes sucrées</a></li>
                  </ul>
            </li>

            <!-- Menu déroulant pour les catégories dynamique -->
            <li class="nav-item dropdown">
                <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="true" style="color: #542B20">Catégories</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <?php foreach($cats as $cat): ?>
                    <li><a class="dropdown-item" href="<?= base_url('categorie/' .$cat['id'])?>"><?= $cat['nom_categorie']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link mx-2 dropdown-toggle" href="#" id="navTest" role="button" data-bs-toggle="dropdown" aria-expanded="true" style="color: #542B20">Tags</a>
                  <ul class="dropdown-menu" aria-labelledby="navTest">

                    <!-- boucle pour insérer les tags que l'on a récupérer via le TagsModel -->
                    <?php foreach($tags as $tag): ?>
                      <li><a class="dropdown-item" href="<?= base_url('tag/' .$tag['id'])?>"><?= $tag['nom_tags']; ?></a></li>
                      <?php endforeach; ?>
                  </ul>
                  
            </li>

          
            <li class="nav-item">
              <a class="nav-link mx-2" style="color: #542B20" href="<?= base_url('categorie/4')?>">Boissons</a>
            </li>
	          <li class="nav-item">
	            <a class="nav-link mx-2" style="color: #542B20" href="<?= base_url('tag/20')?>">Coin Végétarien</a>
	          </li>
          </ul>
	        <ul class="navbar-nav ms-auto d-sm-inline-flex">
            <span class="align-self-center pe-3">pseudo utilisateur</span>
            <li class="nav-item dropstart">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
              <img src="<?=base_url('assets/images/toque8.svg')?>" id= "logo" alt="logo" height="40" class="d-inline-block"></a>

                <?= $this->include('partial/adminNav') ?>


              <!-- début partial -->
                <!-- <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="<?= base_url('gloutForm')?>">Ajouter recette</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#deconnexion">Deconnexion</a></li>
                </ul> -->
              <!-- fin partial -->

           </li>
	        </ul>
	    </div>
	  </div>
  </nav>

  <!-- navbar admin latérale -->
  <div class="container-fluid mt-3" style="background-color: #F6F4EA;">
    <div class="row">
      
        <!--include ici navbar dynamique en fonction du partial -->

      <div class="col-sm p-3 min-vh-100">
        <!-- contenu dynamique -->
        <section>
          <?= $this->renderSection('contenuSession') ?>
        </section> 

      </div>
    </div>
  </div>

    <!-- footer -->
    <div class="container-fluid px-5" style="background-color: #FAECDC;">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
          <div class="col-md-4 d-flex align-items-center">
            <img src="<?=base_url('assets/images/logo.svg')?>" class="mb-3 me-2 mb-md-0 text-muted lh-1" id= "logo" alt="logo" width="50">
          <span class="mb-3 mb-md-0 text-muted">&copy; 2023 Gloutonnade</span>
          </div>

          <ul class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark list-unstyled">
              <li class="nav-item"><a href="<?= base_url('test2')?>" class="nav-link px-2 text-muted">Accueil</a></li>
              <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Contact</a></li>
              <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Mentions légales</a></li>
          </ul>

          <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
          <li class="ms-3"><a class="text-muted" href="#"><i class="bi bi-twitter fs-4"></i></a></li>
          <li class="ms-3"><a class="text-muted" href="#"><i class="bi bi-facebook fs-4"></i></a></li>
          <li class="ms-3"><a class="text-muted" href="#"><i class="bi bi-instagram fs-4"></i></a></li>
          </ul>
      </footer>
    </div>

    <script src="<?=base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
    <script src="<?=base_url('assets/js/popper.min.js')?>"></script>
  </body>
</html>

