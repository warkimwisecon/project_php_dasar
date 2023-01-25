<?php
session_start();
if (isset($_SESSION["user_login"])) {
    unset($_SESSION["user_login"]);
    session_destroy();
    echo "<p>BERHASIL LOGOUT</p>";
    echo "<a href='index.php'>Lanjutkan</a>";
} else {
    header('Location:index.php');
}
