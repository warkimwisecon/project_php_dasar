<?php
require_once("functions.php");
include("parts/header.php");

if (isset($_POST['login'])) {
    if (login($_POST)) {
        echo "<p style='color:green;'>BERHASIL</p>";
        header("Refresh:3; url=index.php", true, 200);
    } else {
        echo "<p style='color:red;'>Email atau Password Salah</p>";
    }
}

if (isset($_SESSION['user_login'])) {
    header("Location:index.php");
}
?>

<h2>Login</h2>

<form action="" method="POST">
    <input type="text" name="email" placeholder="Email Address" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="login">Login</button>
</form>

<?php
include("parts/footer.php");
?>