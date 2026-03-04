<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-3 d-flex justify-content-center">

        <div class="col-10">

            <h3><?php echo $data['title']; ?></h3>

            <a href="<?= URLROOT; ?>/SmartphoneController/index">Overzicht smartphones</a> |

            <a href="<?= URLROOT; ?>/SneakersController/index">Mooiste Sneakers</a> |

            <a href="<?= URLROOT; ?>/HorlogesController/index">Duurste Horloges</a> |

            <a href="<?= URLROOT; ?>/ZangeressenController/index">Rijkste zangeressen</a>

        </div>

    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>