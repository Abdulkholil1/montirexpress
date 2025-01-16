<?php
$host = 'localhost';
$db_user = 'root'; // Ganti dengan username MySQL Anda
$db_pass = '';     // Ganti dengan password MySQL Anda
$db_name = 'montir_app';

$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>