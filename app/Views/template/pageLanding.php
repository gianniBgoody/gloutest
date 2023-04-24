<?= $this->extend('agencement/planAccueil') ?>

<?= $this->section('contenuAccueil') ?>

<div class="container-fluid my-3" style="background-color: #CCD5AE;">
    <div class="row" >
        <div class="col-12 col-md-5 col-lg-6 offset-1">
            <h1 class="text-landing-h1 ">GLOUTONNADE</h1>
            <h4 class="text-landing-h4">Le site qui vous régale</h4>
            <h6 class="text-landing-h6">
            Des idées de recettes simples et savoureuses à commenter et à déguster.<br>
            Une communauté active et nombreuses vous accueille à sa table. <br>
            Partagez vos recettes, devenez un Glouton !
            </h6>
            <a href="<?=base_url('login')?>" type="button" class="btn btn-outline-success fw-bold mt-2">REJOINDRE</a>
        </div>
        <div class="col-12 col-md-6 col-lg-5">
        <img src="<?=base_url('assets/images/homme1.svg')?>" alt="homme qui cuisine" width="" class="figure-img img-fluid my-3">
        </div>
    </div>
    <div class="row d-flex justify-content-evenly g-3 my-3">
        <div class="col-12 col-md-6 col-lg-4 my-3 mx-4 rounded-2" style="width: 20rem; background-color: #FEFAE0;">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <img src="<?=base_url('assets/images/planche.svg')?>" class="img-fluid rounded-start" alt="ustensile de cuisine.">
                    </div>
                    <div class="col-7">

                    <h6 class="card-subtitle mb-3 text-muted">Integer lacinia nulla at fringilla porta. Fusce fermentum mi ut sem ornare iaculis. Nullam at pretium eros.</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 my-3 mx-4 rounded-2" style="width: 20rem; background-color: #FEFAE0;">
            <div class="card-body">
            <div class="row">
                    <div class="col-5 d-flex">
                        <img src="<?=base_url('assets/images/sacFarine.svg')?>" class="img-fluid rounded-start align-self-end" alt="ustensile de cuisine.">
                    </div>
                    <div class="col-7">

                    <h6 class="card-subtitle mb-3 text-muted">Integer lacinia nulla at fringilla porta. Fusce fermentum mi ut sem ornare iaculis. Nullam at pretium eros.</h6>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 my-3 mx-4 rounded-2" style="width: 20rem; background-color: #FEFAE0;">
            <div class="card-body">
            <div class="row">
                    <div class="col-4">
                        <img src="<?=base_url('assets/images/pilon.png')?>" class="img-fluid rounded-start" alt="ustensile de cuisine">
                    </div>
                    <div class="col-8">

                    <h6 class="card-subtitle mb-3 text-muted">Integer lacinia nulla at fringilla porta. Fusce fermentum mi ut sem ornare iaculis. Nullam at pretium eros.</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid my-3" style="background-color: #FAECDC;">
    <div class="row">
      <div class="col-12 col-md-4 col-lg-3 offset-1">
        <img src="<?=base_url('assets/images/femme11.svg')?>" alt="femme qui cuisine" class="figure-img img-fluid my-3">
      </div>
      <div class="col-12 col-md-6 col-lg-7 d-flex">
        <h1 class="align-self-center ms-5">La Gloutonnerie du moment</h1>
      </div>
    </div>

        <!-- carte recette du mois -->
        <?= $this->include('partial/landingCard') ?>

</div>

<div class="container-fluid my-3" style="background-color: #CCD5AE;">
  <div class="row">
    <div class="col-12 col-md-5 col-lg-6 offset-1">
        <h2 class="mt-5">Qui sommes nous?</h2>
        <p>Nam aliquam mi faucibus eleifend posuere. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum in sapien quis lorem eleifend sodales.</p>
        <p>In a malesuada ante. Integer odio ante, faucibus vitae condimentum ullamcorper, bibendum semper lorem. Praesent eleifend turpis lacus, et tempus massa vehicula id. Mauris in magna id lorem ultrices pulvinar. Duis dignissim dictum urna sit amet lacinia. </p>
        <p>Nullam ultrices elementum libero. Duis in ipsum nulla. Nunc viverra sem eget massa feugiat, sit amet imperdiet ipsum congue. Integer in ultricies arcu. Integer imperdiet ante ac condimentum ullamcorper. Mauris suscipit, lorem in ultricies condimentum, purus tortor malesuada leo, eget rutrum orci libero a nulla.</p>
    </div>
    <div class="col-12 col-md-5 col-lg-4">
    <img src="<?=base_url('assets/images/hero_ustensile.png')?>" alt="femme qui cuisine" class="figure-img img-fluid my-3" width="">
    </div>
  </div>
</div>


<?= $this->endSection() ?>
