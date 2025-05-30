<?php
require_once 'ClassDosen.php';
$dosen = new Dosen();
$dosen->delete($_GET['id']);
header("Location: viewdosen.php");
exit;
?>
