<?php
require __DIR__ . '/../partials/header.php';
?>

    <div class="starter-template">
    <div class="row" align="center">
        <div class="col-lg-12 col-md-6">
            <h1>Registration page</h1>
<!--            --><?//= BASE_URL ?><!--<br>-->
        </div>
    </div>

    <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <form class="form-group" method="POST" action="<?= BASE_URL . '?q=user/store/' ?>">

            <input type="hidden" name="q" value="user/store/">
            <label for="name"></label>
            <input class="form-control" type="text" name="name" placeholder="Name">

            <label for="email"></label>
            <input class="form-control" type="email" name="email" placeholder="Email">

            <label for="password"></label>
            <input class="form-control" type="password" name="password" placeholder="Password">

            <label for="password2"></label>
            <input class="form-control" type="password" name="password2" placeholder="RePassword">


            <button type="submit" class="btn btn-primary" style="float: right">Create</button>

        </form>
    </div>
    <div class="col-lg-2"><div>
        </div>
    </div>

<?php
require __DIR__ . '/../partials/footer.php';
?>