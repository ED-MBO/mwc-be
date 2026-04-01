<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-10">
            <h2><?php echo $data['title']; ?></h2>
            <hr>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">
            <p class="lead">Welkom bij MVC Basics. Selecteer een categorie in de navbar om de CRUD functionaliteit te bekijken.</p>
        </div>
    </div>

    <div class="row mt-4 d-flex justify-content-center homepage-links">
        <div class="col-10">
            <div class="row">
                <div class="col-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-phone"></i> Smartphones</h5>
                            <p class="card-text">Beheer een overzicht van smartphones met merk, model, prijs en specificaties.</p>
                            <a href="<?= URLROOT; ?>/SmartphoneController/index" class="btn btn-primary">Bekijk Smartphones</a>
                        </div>
                    </div>
                </div>

                <div class="col-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-shoe"></i> Sneakers</h5>
                            <p class="card-text">Beheer een overzicht van sneakers met merk, model en type.</p>
                            <a href="<?= URLROOT; ?>/SneakersController/index" class="btn btn-primary">Bekijk Sneakers</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-clock"></i> Horloges</h5>
                            <p class="card-text">Beheer een overzicht van luxe horloges met merk, model, prijs en materiaal.</p>
                            <a href="<?= URLROOT; ?>/HorlogesController/index" class="btn btn-primary">Bekijk Horloges</a>
                        </div>
                    </div>
                </div>

                <div class="col-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-music-note-beamed"></i> Zangeressen</h5>
                            <p class="card-text">Beheer een overzicht van de rijkste zangeressen ter wereld.</p>
                            <a href="<?= URLROOT; ?>/ZangeressenController/index" class="btn btn-primary">Bekijk Zangeressen</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>