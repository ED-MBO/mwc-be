<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">
            <h3><?php echo $data['title']; ?></h3>
        </div>
    </div>

    <!-- Terugkoppeling naar de gebruiker -->
    <div class="row mt-3 d-<?= $data['display']; ?> justify-content-center">
        <div class="col-10 text-begin text-primary">
            <div class="alert alert-success" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10 text-begin text-danger">
            <a href="<?= URLROOT; ?>/HorlogesController/create"
            class="btn btn-warning"
            role="button">Nieuw horloge
            </a>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">
       <table class="table table-striped">
    <thead>
        <tr>
            <th>Merk</th>
            <th>Model</th>
            <th>Prijs</th>
            <th>Materiaal</th>
            <th>Type</th>
            <th>Kenmerk</th>
            <th>Verwijder</th>
            <th>Wijzig</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data['result'] as $horloge) : ?>
            <tr>
                <td><?= $horloge->Merk; ?></td>
                <td><?= $horloge->Model; ?></td>
                <td>€ <?= number_format($horloge->Prijs, 0, ',', '.'); ?></td>
                <td><?= $horloge->Materiaal; ?></td>
                <td><?= $horloge->Type; ?></td>
                <td><?= $horloge->UniekKenmerk; ?></td>
                <td class="text-center">
                    <a href="<?= URLROOT; ?>/HorlogesController/delete/<?= $horloge->Id; ?>"
                        onclick="return confirm('Weet je zeker dat je dit record wilt verwijderen?');">
                        <i class="bi bi-trash3-fill text-danger"></i>
                    </a>
                </td>
                <td class="text-center">
                    <a href="<?= URLROOT; ?>/HorlogesController/update/<?= $horloge->Id; ?>">
                        <i class="bi bi-pencil-fill text-success"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

            <a href="<?= URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left"></i></a>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>