<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-6">
            <h3 class="text-success"><?php echo $data['title']; ?></h3>
        </div>
    </div>

    <div class="row mt-3 d-<?= $data['display']; ?> justify-content-center">
        <div class="col-6 text-begin text-primary">
            <?php $hasErrors = !empty($data['errors']); ?>
            <div class="alert <?= $hasErrors ? 'alert-danger' : 'alert-success'; ?>" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-6">
            <form action="<?= URLROOT; ?>/HorlogesController/create" method="post">
                <div class="mb-3">
                    <label for="merk" class="form-label">Merk</label>
                    <input name="merk" type="text" class="form-control <?= isset($data['errors']['merk']) ? 'is-invalid' : ''; ?>" id="merk" value="<?= $_POST['merk'] ?? ''; ?>">
                    <?php if (isset($data['errors']['merk'])) : ?>
                        <div class="invalid-feedback"><?= $data['errors']['merk']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="model" class="form-label">Model</label>
                    <input name="model" type="text" class="form-control <?= isset($data['errors']['model']) ? 'is-invalid' : ''; ?>" id="model" value="<?= $_POST['model'] ?? ''; ?>" required>
                    <?php if (isset($data['errors']['model'])) : ?>
                        <div class="invalid-feedback"><?= $data['errors']['model']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="prijs" class="form-label">Prijs</label>
                    <input name="prijs" type="number" min="0" step="0.01" class="form-control <?= isset($data['errors']['prijs']) ? 'is-invalid' : ''; ?>" id="prijs" value="<?= $_POST['prijs'] ?? ''; ?>" required>
                    <?php if (isset($data['errors']['prijs'])) : ?>
                        <div class="invalid-feedback"><?= $data['errors']['prijs']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="materiaal" class="form-label">Materiaal</label>
                    <input name="materiaal" type="text" class="form-control <?= isset($data['errors']['materiaal']) ? 'is-invalid' : ''; ?>" id="materiaal" value="<?= $_POST['materiaal'] ?? ''; ?>" required>
                    <?php if (isset($data['errors']['materiaal'])) : ?>
                        <div class="invalid-feedback"><?= $data['errors']['materiaal']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="gewicht" class="form-label">Gewicht (gram)</label>
                    <input name="gewicht" type="number" min="0" class="form-control <?= isset($data['errors']['gewicht']) ? 'is-invalid' : ''; ?>" id="gewicht" value="<?= $_POST['gewicht'] ?? ''; ?>" required>
                    <?php if (isset($data['errors']['gewicht'])) : ?>
                        <div class="invalid-feedback"><?= $data['errors']['gewicht']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="releasedatum" class="form-label">Releasedatum</label>
                    <input name="releasedatum" type="date" class="form-control <?= isset($data['errors']['releasedatum']) ? 'is-invalid' : ''; ?>" id="releasedatum" value="<?= $_POST['releasedatum'] ?? ''; ?>" required>
                    <?php if (isset($data['errors']['releasedatum'])) : ?>
                        <div class="invalid-feedback"><?= $data['errors']['releasedatum']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="waterdichtheid" class="form-label">Waterdichtheid</label>
                    <input name="waterdichtheid" type="text" class="form-control <?= isset($data['errors']['waterdichtheid']) ? 'is-invalid' : ''; ?>" id="waterdichtheid" value="<?= $_POST['waterdichtheid'] ?? ''; ?>" required>
                    <?php if (isset($data['errors']['waterdichtheid'])) : ?>
                        <div class="invalid-feedback"><?= $data['errors']['waterdichtheid']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input name="type" type="text" class="form-control <?= isset($data['errors']['type']) ? 'is-invalid' : ''; ?>" id="type" value="<?= $_POST['type'] ?? ''; ?>" required>
                    <?php if (isset($data['errors']['type'])) : ?>
                        <div class="invalid-feedback"><?= $data['errors']['type']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="uniekkenmerk" class="form-label">Uniek kenmerk</label>
                    <input name="uniekkenmerk" type="text" class="form-control <?= isset($data['errors']['uniekkenmerk']) ? 'is-invalid' : ''; ?>" id="uniekkenmerk" value="<?= $_POST['uniekkenmerk'] ?? ''; ?>" required>
                    <?php if (isset($data['errors']['uniekkenmerk'])) : ?>
                        <div class="invalid-feedback"><?= $data['errors']['uniekkenmerk']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="d-flex justify-content-between mt-3 mb-5">
                    <button type="submit" class="btn btn-primary">Verstuur</button>
                    <a href="<?= URLROOT; ?>/homepages/index" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Terug naar homepage
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>
