<?php
require_once 'koneksi.php';

class Mahasiswa {
    private $conn;

    public function __construct() {
        $db = new Koneksi();
        $this->conn = $db->conn;
    }

    // Menampilkan semua data mahasiswa
    public function tampil() {
        $stmt = $this->conn->prepare("SELECT * FROM t_mahasiswa ORDER BY npm ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Menambah data mahasiswa baru
    public function tambah($npm, $namaMhs, $prodi, $alamat, $noHP) {
        $stmt = $this->conn->prepare("INSERT INTO t_mahasiswa (npm, namaMhs, prodi, alamat, noHP) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$npm, $namaMhs, $prodi, $alamat, $noHP]);
    }

    // Mengubah data mahasiswa
    public function ubah($npm, $namaMhs, $prodi, $alamat, $noHP) {
        $stmt = $this->conn->prepare("UPDATE t_mahasiswa SET namaMhs=?, prodi=?, alamat=?, noHP=? WHERE npm=?");
        return $stmt->execute([$namaMhs, $prodi, $alamat, $noHP, $npm]);
    }

    // Menghapus data mahasiswa
    public function hapus($npm) {
        $stmt = $this->conn->prepare("DELETE FROM t_mahasiswa WHERE npm=?");
        return $stmt->execute([$npm]);
    }

    // Mendapatkan data mahasiswa berdasarkan NPM
    public function getByNpm($npm) {
        $stmt = $this->conn->prepare("SELECT * FROM t_mahasiswa WHERE npm=?");
        $stmt->execute([$npm]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Pencarian data mahasiswa berdasarkan nama
    public function cari($nama) {
        $stmt = $this->conn->prepare("SELECT * FROM t_mahasiswa WHERE namaMhs LIKE ?");
        $stmt->execute(['%' . $nama . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
