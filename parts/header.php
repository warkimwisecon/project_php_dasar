<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Manager</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.min.css">
    <style>
        ul {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        li {
            margin-right: 18px;
            display: inline;
        }
    </style>
</head>

<body>

    <ul class="navbar">
        <li><a href="/">Home</a></li>
        <?php
        if (isset($_SESSION["user_login"])) :
        ?>
            <li><a href="/add.php">Tambah User</a></li>
            <li><a href="/logout.php">Logout</a></li>
        <?php
        endif;
        if (!isset($_SESSION["user_login"])) :
        ?>
            <li><a href="/login.php">Login</a></li>
        <?php
        endif;
        ?>
    </ul>

    <div class="user">
        <?php
        if (isset($_SESSION["user_login"])) {
            echo "# Selamat datang <strong>" . $_SESSION['user_login']['name'] . "</strong>";
        }
        ?>
    </div>