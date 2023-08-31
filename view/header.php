<!DOCTYPE html>
<html lang="es">
<?php
session_start();
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>COMPUTER_FORUM_AA2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">

    <div class="col-md-3 mb-2 mb-md-0">
        <h4 class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">COMPUTER FORUM</h4>
    </div>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="/NewForum-PHP/index.php" class="nav-link px-2 link-secondary">Topics</a></li>
        <li><a href="#" class="nav-link px-2">FAQs</a></li>
    </ul>
    <?php
    if(isset($_SESSION["user"])){ ?>
        <div class="col-md-3 text-end">
            <a href="/NewForum-PHP/index.php"  type="button" class="btn btn-outline-primary me-2">My User</a>
            <form method="post">
                <input type="submit" class="btn btn-primary" name="destroy" value="Logout">
            </form>
        </div>
    <?php
    } else {
    ?>
    <div class="col-md-3 text-end">
        <a href="/NewForum-PHP/view/login.php"  type="button" class="btn btn-outline-primary me-2">Login</a>
        <a href="/NewForum-PHP/view/register.php"  type="button" class="btn btn-primary me-2">Sign in</a>
    </div>
    <?php
    }
    if (isset($_POST["destroy"])) {
        unset($_SESSION["user"]);
        unset($_SESSION["userID"]);
        unset($_SESSION["role"]);
        header("Refresh:0");
    }
    ?>
</header>