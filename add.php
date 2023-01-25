<?php
require_once("functions.php");
if (!isset($_SESSION["user_login"])) {
    header("Location:index.php");
}

include("parts/header.php");

if (isset($_POST["simpan"])) {
    if (simpan($_POST)) {
        echo "<p style='color:green;'>BERHASIL TERSIMPAN</p>";
    } else {
        echo "<p style='color:red;'>GAGAL MENYIMPAN</p>";
    }
}
?>

<h2>TAMBAH USER</h2>

<form action="" method="POST">
    <div class="container">
        <label for="fullname">Full Name</label>
        <input type="text" name="fullname" id="fullname">
    </div>
    <div class="container">
        <label for="phone">Phone Number</label>
        <input type="number" name="phone" id="phone">
    </div>
    <div class="container">
        <label for="email">E-Mail Address</label>
        <input type="email" name="email" id="email">
    </div>
    <div class="container">
        <label for="gender">Gender</label>
        <select name="gender" id="gender">
            <option value="L" selected>Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
    </div>
    <div class="container">
        <label for="password">password</label>
        <input type="password" name="password" id="password">
    </div>

    <div class="container">
        <button type="submit" name="simpan">Simpan</button>
    </div>

</form>

<?php
include("parts/footer.php");
?>