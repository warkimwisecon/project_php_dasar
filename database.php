<?php
$host       = "localhost";
$username   = "root";
$password   = "";
$database   = "user_manager";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error " . $e->getMessage());
}
return $conn;
$conn = null;
