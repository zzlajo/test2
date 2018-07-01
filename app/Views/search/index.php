<?php
require __DIR__ . '/../partials/header.php';
?>

    <div class="starter-template">
    <div class="row" align="center">
        <div class="col-lg-12 col-md-6">
            <h1>Search page</h1>
        </div>
    </div>

    <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <form class="form-group" method="POST" action="<?= BASE_URL . '?q=search/result/' ?>">

            <label for="query"></label>
            <input class="form-control" type="text" name="query" placeholder="Search">

            <button type="submit" class="btn btn-primary" style="float: right">Submit</button>

        </form>
    </div>
    <div class="col-lg-2"><div>
        </div>
    </div>

<?php
require __DIR__ . '/../partials/footer.php';
?>