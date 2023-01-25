<?php
require_once("functions.php");
include("parts/header.php");

$all_users = users();

if (isset($_POST["hapus"])) {
    if (hapus($_POST)) {
        echo "<p style='color:green;'>DATA BERHASIL DI HAPUS</p>";
    } else {
        echo "<p style='color:red;'>TIDAK DAPAT MENGHAPUS DATA</p>";
    }
}

if (isset($_SESSION['user_login'])) {
}
?>

<h2>ALL USERS</h2>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Full Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Password</th>
            <th>Act</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($all_users as $d) :
            $gender = $d['gender'] === "L" ? "Laki-laki" : "Perempuan";
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d["fullname"]; ?></td>
                <td><?= $d["phone"]; ?></td>
                <td><?= $d["email"]; ?></td>
                <td><?= $gender; ?></td>
                <td>***</td>
                <td>
                    <?php
                    if (isset($_SESSION["user_login"])) :
                    ?>
                        <a href="/edit.php?edit=<?= $d['id']; ?>">Edit</a>
                        <form action="" method="POST">
                            <input type="hidden" name="id" value="<?= $d['id']; ?>">
                            <button type="submit" name="hapus">Hapus</button>
                        </form>

                    <?php
                    endif;
                    ?>
                </td>
            </tr>
        <?php
        endforeach;
        ?>
    </tbody>
</table>

<?php
include("parts/footer.php");
?>