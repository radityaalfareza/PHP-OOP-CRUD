<?php
class Koneksi {
    private $host = "localhost";
    private $db = "kuliah";
    private $user = "root";
    private $pass = "";
    public $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Koneksi gagal: " . $e->getMessage());
        }
    }
}
?>
