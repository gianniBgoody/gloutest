
<?= $this->extend('agencement/planSession') ?>

<?= $this->section('contenuSession') ?>

<div class="container-fluid mt-2" style="background-color: #CCD5AE;">
  <h2 class="text-center"><?= $title ?></h2>
</div>


<div class="container-fluid my-5" style="background-color: #E9EDC9;">
  <div class="row g-3">
    <?php foreach($cardData as $card) : ?>
      <div class="col-12 col-md-6 col-lg-4 my-3">

        <a href="<?= base_url('glouton/'.$card["id"])?>">
          <div class="card h-100">
          <img src="<?= base_url('uploads/'.$card["image"])?>" class="card-img-top ratio" alt="image cuisine"></a>

          <div class="card-body">
            <h5 class="card-title"><?= $card["nom"] ?></h5>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</div>

<?= $this->endSection() ?>

