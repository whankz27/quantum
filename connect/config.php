<?php
// config.php

// Konfigurasi database
$servername = "localhost";
$username = "root";  // Ganti dengan username database Anda
$password = "";      // Ganti dengan password database Anda
$dbname = "db_quantum";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
