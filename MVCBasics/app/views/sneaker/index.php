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
        <th>Merk</th>
        <th>Model</th>
        <th>Type</th>
        <th>Prijs</th>
        <th>Materiaal</th>
        <th>Gewicht</th>
        <th>Releasedatum</th>
    </tr>
</thead>
<tbody>
    <?php foreach($data['result'] as $Sneakers) : ?>
        <tr>
            <td><?= $Sneakers->Merk; ?></td>
            <td><?= $Sneakers->Model; ?></td>
            <td><?= $Sneakers->Type; ?></td>
            <td><?= $Sneakers->Prijs; ?></td>
            <td><?= $Sneakers->Materiaal; ?></td>
            <td><?= $Sneakers->Gewicht; ?></td>
            <td><?= $Sneakers->Releasedatum; ?></td>
        </tr>
    <?php endforeach; ?>
</tbody>
            </table>

            <a href="<?= URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left"></i></a>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>