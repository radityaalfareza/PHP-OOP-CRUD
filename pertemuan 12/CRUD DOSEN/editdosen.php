<?php
require_once 'ClassDosen.php';
$dosen = new Dosen();
$data = $dosen->getById($_GET['id']);
?>
<link rel="stylesheet" href="style.css">
<form method="POST" action="proses_editdosen.php">
    <h2 align="center">Edit Dosen</h2>
    <input type="hidden" name="id" value="<?= $data['idDosen'] ?>">
    <label>Nama Dosen:</label>
    <input type="text" name="namaDosen" value="<?= $data['namaDosen'] ?>" required>
    <label>No HP:</label>
    <input type="text" name="noHP" value="<?= $data['noHP'] ?>" required>
    <input type="submit" value="Update">
</form>
