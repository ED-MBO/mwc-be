<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">
            <h3><?php echo $data['title']; ?></h3>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Netto Waarde</th>
                        <th>Land</th>
                        <th>Leeftijd</th>
                        <th>Bekendste Nummer</th>
                        <th>Debuut</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['result'] as $zangeres) : ?>
                        <tr>
                            <td><?= $zangeres->Naam; ?></td>
                            <td><?= $zangeres->NettoWaarde; ?></td>
                            <td><?= $zangeres->Land; ?></td>
                            <td><?= $zangeres->Leeftijd; ?></td>
                            <td><?= $zangeres->BekendsteNummer; ?></td>
                            <td><?= $zangeres->Debuut; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <a href="<?= URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left"></i></a>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>