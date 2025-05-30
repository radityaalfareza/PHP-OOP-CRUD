<?php
// Buat koneksi ke database
$con = new mysqli("localhost", "root", "", "perkuliahan");

// Cek koneksi
if ($con->connect_error) {
    die("Koneksi gagal: " . $con->connect_error);
}

// Langsung ambil ID 1 (tanpa $_GET)
$idDosen = 1;

// Buat prepared statement
$statement = $con->prepare("SELECT * FROM t_dosen WHERE idDosen = ?");
$statement->bind_param("i", $idDosen);
$statement->execute();
$result = $statement->get_result();

// Cek apakah ada data
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID Dosen: " . htmlspecialchars($row['idDosen']) . "<br>";
        echo "Nama Dosen: " . htmlspecialchars($row['namaDosen']) . "<br>";
        // Tambahkan kolom lain jika ada, misal:
        // echo "Email: " . htmlspecialchars($row['email']) . "<br>";
    }
} else {
    echo "Data dosen dengan ID 1 tidak ditemukan.";
}

// Tutup koneksi
$statement->close();
$con->close();
?>
