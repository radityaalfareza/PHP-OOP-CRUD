<?php
require_once 'mahasiswa.php';
$mhs = new Mahasiswa();

// Proses tambah data
if (isset($_POST['aksi']) && $_POST['aksi'] == 'tambah') {
    $mhs->tambah($_POST['npm'], $_POST['namaMhs'], $_POST['prodi'], $_POST['alamat'], $_POST['noHP']);
    header("Location: index.php");
    exit;
}

// Proses update data
if (isset($_POST['aksi']) && $_POST['aksi'] == 'ubah') {
    $mhs->ubah($_POST['npm'], $_POST['namaMhs'], $_POST['prodi'], $_POST['alamat'], $_POST['noHP']);
    header("Location: index.php");
    exit;
}

// Proses hapus data
if (isset($_GET['hapus'])) {
    $mhs->hapus($_GET['hapus']);
    header("Location: index.php");
    exit;
}

// Ambil data untuk edit
$dataEdit = null;
if (isset($_GET['edit'])) {
    $dataEdit = $mhs->getByNpm($_GET['edit']);
}

// Proses pencarian
$dataMahasiswa = [];
if (isset($_GET['cari']) && $_GET['cari'] != '') {
    $dataMahasiswa = $mhs->cari($_GET['cari']);
} else {
    $dataMahasiswa = $mhs->tampil();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Mahasiswa OOP</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .container { width: 85%; margin: 30px auto; background: #fff; padding: 20px; border-radius: 8px; }
        h2 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ddd; }
        th { background: #007bff; color: #fff; }
        tr:nth-child(even) { background: #f9f9f9; }
        .form-group { margin-bottom: 10px; }
        label { display: block; margin-bottom: 5px; }
        input[type=text] { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        button { background: #007bff; color: #fff; border: none; padding: 8px 16px; border-radius: 4px; cursor: pointer; }
        button:hover { background: #0056b3; }
        .aksi { display: flex; gap: 6px; }
        .search-form { margin-bottom: 20px; display: flex; gap: 10px; }
    </style>
</head>
<body>
<div class="container">
    <h2>Data Mahasiswa</h2>
    <!-- Form Pencarian -->
    <form class="search-form" method="get">
        <input type="text" name="cari" placeholder="Cari nama mahasiswa..." value="<?= htmlspecialchars($_GET['cari'] ?? '') ?>">
        <button type="submit">Cari</button>
        <a href="index.php"><button type="button">Reset</button></a>
    </form>

    <!-- Form Input Data Baru / Edit -->
    <form method="post">
        <div class="form-group">
            <label>NPM</label>
            <input type="text" name="npm" value="<?= $dataEdit['npm'] ?? '' ?>" <?= $dataEdit ? 'readonly' : '' ?> required>
        </div>
        <div class="form-group">
            <label>Nama Mahasiswa</label>
            <input type="text" name="namaMhs" value="<?= $dataEdit['namaMhs'] ?? '' ?>" required>
        </div>
        <div class="form-group">
            <label>Prodi</label>
            <input type="text" name="prodi" value="<?= $dataEdit['prodi'] ?? '' ?>" required>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" value="<?= $dataEdit['alamat'] ?? '' ?>" required>
        </div>
        <div class="form-group">
            <label>No HP</label>
            <input type="text" name="noHP" value="<?= $dataEdit['noHP'] ?? '' ?>" required>
        </div>
        <button type="submit" name="aksi" value="<?= $dataEdit ? 'ubah' : 'tambah' ?>">
            <?= $dataEdit ? 'Ubah' : 'Tambah' ?> Data
        </button>
        <?php if ($dataEdit): ?>
            <a href="index.php"><button type="button">Batal</button></a>
        <?php endif; ?>
    </form>

    <!-- Tabel Data Mahasiswa -->
    <table>
        <tr>
            <th>NPM</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($dataMahasiswa as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['npm']) ?></td>
            <td><?= htmlspecialchars($row['namaMhs']) ?></td>
            <td><?= htmlspecialchars($row['prodi']) ?></td>
            <td><?= htmlspecialchars($row['alamat']) ?></td>
            <td><?= htmlspecialchars($row['noHP']) ?></td>
            <td class="aksi">
                <a href="?edit=<?= $row['npm'] ?>"><button>Edit</button></a>
                <a href="?hapus=<?= $row['npm'] ?>" onclick="return confirm('Hapus data ini?')"><button>Hapus</button></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
