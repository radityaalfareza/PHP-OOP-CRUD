<?php
$con = new mysqli("localhost", "root", "", "perkuliahan");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Query insert
$sql = "INSERT INTO t_dosen (idDosen, namaDosen, noHP) 
        VALUES (10, 'Rahmat Dwi Prasetya', 'rahmat@example.com')";

if ($con->query($sql) === TRUE) {
    echo "Data dosen berhasil ditambahkan";
} else {
    echo "Error: " . $con->error;
}

// Tutup koneksi
$con->close();
?>
