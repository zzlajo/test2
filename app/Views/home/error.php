<?php
require __DIR__ . '/../partials/header.php';
?>

    <div class="row" align="center">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    Oops!
                </h1>
                <h2>
                    <?= $code ?>
                </h2>
                <div class="error-details">
                    <?= $message ?>
                </div>
                <div class="error-actions">
                    <a href="<?= BASE_URL ?>" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                        Take Me Home
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php
require __DIR__ . '/../partials/footer.php';
?>