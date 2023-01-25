<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
// set session
require_once("database.php");

function simpan($data)
{
    global $conn;
    $fullname = !empty($data["fullname"]) ? $data["fullname"] : false;
    $phone = !empty($data["phone"]) ? $data["phone"] : "";
    $email = !empty($data["email"]) ? $data["email"] : "";
    $gender = $data["gender"];
    $password = !empty($data["password"]) ? password_hash($data["password"], PASSWORD_DEFAULT) : false;

    $sql = $conn->prepare("INSERT INTO users (fullname, phone, email, gender, password) VALUES(?, ?, ?, ?, ?)");

    $sql->bindValue(1, $fullname);
    $sql->bindValue(2, $phone);
    $sql->bindValue(3, $email);
    $sql->bindValue(4, $gender);
    $sql->bindValue(5, $password);

    if ($sql->execute()) {
        return true;
    } else {
        return false;
    }
}

function hapus($id)
{
    global $conn;
    $id = $id["id"];
    $sql = $conn->prepare("DELETE FROM users WHERE id = ?");
    $sql->bindParam(1, $id);
    $sql->execute();

    return $sql->rowCount();
}

function getById($id)
{
    global $conn;
    $sql = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $sql->bindParam(1, $id);
    $sql->execute();

    return $sql->fetch(PDO::FETCH_ASSOC);
}

function update($data)
{
    global $conn;
    $id = !empty($data['id']) ? $data['id'] : false;
    $fullname = !empty($data["fullname"]) ? $data["fullname"] : false;
    $phone = !empty($data["phone"]) ? $data["phone"] : "";
    $email = !empty($data["email"]) ? $data["email"] : "";
    $gender = $data["gender"];
    $password = !empty($data["password"]) ? password_hash($data["password"], PASSWORD_DEFAULT) : "";

    $sql = "UPDATE users SET 
            fullname = ?,
            phone = ?,
            email = ?,
            gender = ?
            ";
    if (!empty($password)) {
        $sql .= ", password = ?";
    }

    $sql .= " WHERE id = ?";

    $result = $conn->prepare($sql);
    $result->bindParam(1, $fullname);
    $result->bindParam(2, $phone);
    $result->bindParam(3, $email);
    $result->bindParam(4, $gender);

    if (!empty($password)) {
        $result->bindParam(5, $password);
        $result->bindParam(6, $id);
    } else {
        $result->bindParam(5, $id);
    }

    return $result->execute();
}

function users()
{
    global $conn;
    $sql = $conn->query("SELECT * FROM users");
    $all = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $all;
}

function login($data)
{
    global $conn;
    $email = !empty($data["email"]) ? $data["email"] : false;
    $pass = !empty($data["password"]) ? $data["password"] : false;
    // ubah plain text password menjadi hash / enkripsi
    $password_encrypt = password_hash($pass, PASSWORD_DEFAULT);
    // Cari data yang identik email
    $cek = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $cek->bindParam(":email", $email);
    $cek->execute();
    // tampung data
    $temp = $cek->fetch(PDO::FETCH_ASSOC);

    if (!$temp) {
        return false;
    }

    // Cek kembali apakah passwordnya sudah benar terhadap password yang tersimpan
    $password_hashed = $temp["password"];
    // BUAT TOKEN
    $TOKEN = date("YmdHi", strtotime("+1Hours")) . random_int(9, 999);
    // Jika true, maka simpan ke session
    if (password_verify($pass, $password_hashed)) {
        $_SESSION['user_login'] = [
            'uid'       => $temp['id'],
            'name'      => $temp['fullname'],
            'token'     => $TOKEN,
            'access'    => true
        ];
        return true;
    } else {
        unset($_SESSION['user_login']);
        return false;
    }
}
