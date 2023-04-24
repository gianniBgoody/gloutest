<?= $this->extend('agencement/planAccueil') ?>
<?= $this->section('contenuAccueil') ?>

<div class="container-fluid mt-3" style="background-color: #F6F4EA;">
    <h3 class="text-center py-3"><?= $title ?></h3>

    <div class="row">
        <div class="col-12 col-md-4 col-lg-4 offset-1 mb-3">
            <h5 class="fw-bold ">Pas encore membre?</h5>
            <a href="<?=base_url('inscription')?>"> <button type="button" class="btn btn-outline-success btn-sm fw-bold mb-5 opacity-75">Créer un compte</button></a>
            <img src="<?= base_url('assets/images/homme11.svg') ?>" alt="femme qui cuisine" class="img-fluid d-none d-sm-block" width="80%">
        </div>
        <div class="col-12 col-md-6 col-lg-6 offset-1 align-self-center">
            <form>
                <div class="col-8 mb-3">
                <input type="text" class="form-control border border-success" name="pseudo" placeholder="Pseudo">
                </div>
                <div class=" col-8 order md-2 order-1 mb-3 ">
                <input type="password" class="form-control border border-success" name="password" placeholder="Mot de passe">
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>