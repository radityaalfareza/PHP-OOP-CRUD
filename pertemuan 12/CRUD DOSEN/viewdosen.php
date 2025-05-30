<?php
require_once 'ClassDosen.php';
$dosen = new Dosen();
$keyword = isset($_GET['cari']) ? $_GET['cari'] : '';
$data = $dosen->read($keyword);
?>

<link rel="stylesheet" href="style.css">

<form method="GET">
    <input type="text" name="cari" placeholder="Cari nama dosen..." value="<?= htmlspecialchars($keyword) ?>">
    <input type="submit" value="Cari">
</form>

<h2 align="center">Daftar Dosen</h2>
<table>
<tr><th>ID</th><th>Nama</th><th>No HP</th><th>Aksi</th></tr>
<?php foreach ($data as $row): ?>
<tr>
    <td><?= $row['idDosen'] ?></td>
    <td><?= $row['namaDosen'] ?></td>
    <td><?= $row['noHP'] ?></td>
    <td>
        <a href="editdosen.php?id=<?= $row['idDosen'] ?>">Edit</a> |
        <a href="hapusdosen.php?id=<?= $row['idDosen'] ?>" onclick="return confirm('Yakin?')">Hapus</a>
    </td>
</tr>
<?php endforeach; ?>
</table>

