<?php
require_once 'Koneksi.php';

class Dosen {
    private $conn;

    public function __construct() {
        $db = new Koneksi();
        $this->conn = $db->conn;
    }

    public function create($nama, $nohp) {
        $stmt = $this->conn->prepare("INSERT INTO t_dosen (namaDosen, noHP) VALUES (?, ?)");
        $stmt->bind_param("ss", $nama, $nohp);
        return $stmt->execute();
    }

    public function read($keyword = "") {
        $keyword = "%" . $keyword . "%";
        $stmt = $this->conn->prepare("SELECT * FROM t_dosen WHERE namaDosen LIKE ?");
        $stmt->bind_param("s", $keyword);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM t_dosen WHERE idDosen = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function update($id, $nama, $nohp) {
        $stmt = $this->conn->prepare("UPDATE t_dosen SET namaDosen = ?, noHP = ? WHERE idDosen = ?");
        $stmt->bind_param("ssi", $nama, $nohp, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM t_dosen WHERE idDosen = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
