<?php
require __DIR__ . '/../partials/header.php';
?>

    <div class="starter-template">
    <div class="row" align="center">
        <div class="col-lg-12 col-md-6">
            <h1>Login page</h1>
        </div>
    </div>

    <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <form class="form-group" method="POST" action="<?= BASE_URL . '?q=user/check/' ?>">
            <label for="email"></label>
            <input class="form-control" type="email" name="email" placeholder="Email">

            <label for="password"></label>
            <input class="form-control" type="password" name="password" placeholder="Password">

            <button type="submit" class="btn btn-primary" style="float: right">Login</button>
        </form>
    </div>
    <div class="col-lg-2"><div>
        </div>
    </div>

<?php
require __DIR__ . '/../partials/footer.php';
?>