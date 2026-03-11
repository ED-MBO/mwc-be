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
            <a href="<?= URLROOT; ?>/SneakersController/create"
            class="btn btn-warning"
            role="button">Nieuwe sneaker
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
        <th>Type</th>
        <th>Prijs</th>
        <th>Materiaal</th>
        <th>Gewicht</th>
        <th>Releasedatum</th>
        <th>Verwijder</th>
    </tr>
</thead>
<tbody>
    <?php foreach($data['result'] as $sneaker) : ?>
        <tr>
            <td><?= $sneaker->Merk; ?></td>
            <td><?= $sneaker->Model; ?></td>
            <td><?= $sneaker->Type; ?></td>
            <td><?= $sneaker->Prijs; ?></td>
            <td><?= $sneaker->Materiaal; ?></td>
            <td><?= $sneaker->Gewicht; ?></td>
            <td><?= $sneaker->Releasedatum; ?></td>
            <td class="text-center">
                <a href="<?= URLROOT; ?>/SneakersController/delete/<?= $sneaker->Id; ?>"
                    onclick="return confirm('Weet je zeker dat je dit record wilt verwijderen?');">
                    <i class="bi bi-trash3-fill text-danger"></i>
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