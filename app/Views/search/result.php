<?php
require __DIR__ . '/../partials/header.php';
?>

    <div class="starter-template">
        <div class="row" align="center">
            <div class="col-lg-12 col-md-6">
                <h1>Search result:</h1>
            </div>
        </div>
        <?php if (is_online()) { ?>
            <div class="row">
                <div class="col-md-12">
                <?php if (count($users)){ ?>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Registration Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($users as $user) {
                            echo "<tr>";
                            echo "<td> {$user->name} </td>";
                            echo "<td> {$user->email} </td>";
                            echo "<td> {$user->created_at} </td>";
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php } else {
                        echo "No results found!";
                    } ?>
                </div>
            </div>
        <?php } else { ?>
            <div class="col-lg-12 col-md-6">
                <h3>Please login!</h3>
                <form class="form-group" method="POST" action="<?= BASE_URL . '?q=user/check/' ?>">
                    <label for="email"></label>
                    <input class="form-control" type="email" name="email" placeholder="Email">

                    <label for="password"></label>
                    <input class="form-control" type="password" name="password" placeholder="Password">

                    <button type="submit" class="btn btn-primary" style="float: right">Login</button>
                </form>
            </div>
        <?php } ?>
    </div>
<?php
require __DIR__ . '/../partials/footer.php';
?>