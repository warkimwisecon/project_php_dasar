<?php
require_once("functions.php");
if (!isset($_SESSION["user_login"])) {
    header("Location:index.php");
}

include("parts/header.php");

if (isset($_POST["update"])) {

    if (update($_POST)) {
        echo "<p style='color:green;'>DATA BERHASIL DI UPDATE</p>";
    } else {
        echo "<p style='color:red;'>GAGAL DI UPDATE</p>";
    }
}

if (isset($_GET["edit"])) {
    $id = $_GET["edit"];
    $data = getById($id);

    if (!$data) {
        header("Location:index.php");
    }
}

?>

<h2>EDIT USER</h2>

<form action="" method="POST">
    <input type="hidden" name="id" value="<?= $id; ?>">
    <div class="container">
        <label for="fullname">Full Name</label>
        <input type="text" name="fullname" id="fullname" value="<?= $data['fullname']; ?>">
    </div>
    <div class="container">
        <label for="phone">Phone Number</label>
        <input type="number" name="phone" id="phone" value="<?= $data['phone']; ?>">
    </div>
    <div class="container">
        <label for="email">E-Mail Address</label>
        <input type="email" name="email" id="email" value="<?= $data['email']; ?>">
    </div>
    <div class="container">
        <label for="gender">Gender</label>
        <select name="gender" id="gender">
            <option value="L" <?= $data['gender'] == "L" ? "selected" : ""; ?>>Laki-laki</option>
            <option value="P" <?= $data['gender'] == "P" ? "selected" : ""; ?>>Perempuan</option>
        </select>
    </div>
    <div class="container">
        <label for="password">password</label>
        <input type="password" name="password" id="password">
    </div>

    <div class="container">
        <button type="submit" name="update">Update</button>
    </div>

</form>


<?php
include("parts/footer.php");
?>