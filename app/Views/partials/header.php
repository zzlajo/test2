<!DOCTYPE>

<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <style>
        body {
            padding-top: 54px;
        }
        @media (min-width: 992px) {
            body {
                padding-top: 56px;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>">
                    Home<span class="sr-only"></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL . '?q=search/index/' ?>">
                    Search<span class="sr-only"></span>
                </a>
            </li>
            <?php if (! is_online()) { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL . '?q=user/login/' ?>">
                    Login<span class="sr-only"></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL . '?q=user/create/' ?>">
                    Registar<span class="sr-only"></span>
                </a>
            </li>
            <?php } else { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL . '?q=user/logout/' ?>">
                    Logout<span class="sr-only"></span>
                </a>
            </li>
            <?php } ?>
        </ul>
    </div>
</nav>

<main role="main" class="container">
    <br>
    <?php
    if (isset($_SESSION['messages'])) {
        echo '<div class="row">';
        if (isset($_SESSION['messages']['errors'])) {
            echo '<div class="col-lg-12" style="background-color: red" align="center">';

            echo '<ul>';
            foreach ($_SESSION['messages']['errors'] as $error) {
                echo "<li class='text-white'> {$error} </li>";
            }
            echo '</ul>';

            echo '</div>';
        }

        if (isset($_SESSION['messages']['success'])) {
            echo '<div class="col-lg-12" style="background-color: green" align="center">';

            echo '<ul>';
            foreach ($_SESSION['messages']['success'] as $success) {
                echo "<li class='text-white'> {$success} </li>";
            }
            echo '</ul>';

            echo '</div>';
        }
        echo '</div>';
    }
    ?>
