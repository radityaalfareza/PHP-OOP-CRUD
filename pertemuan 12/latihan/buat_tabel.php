<?php
$con = new mysqli("localhost", "root", "", "db_praktik");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Buat query SQL
$q = "CREATE TABLE t_Login (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    tgl_registrasi TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

// Eksekusi query
$hasil = $con->query($q);

// Cek hasil
if ($hasil === TRUE) {
    echo "Tabel t_Login berhasil dibuat";
} else {
    echo "Tabel gagal dibuat: " . $con->error;
}

// Tutup koneksi
$con->close();
?>
