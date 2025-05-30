<?php
require_once 'ClassDosen.php';
$dosen = new Dosen();
$dosen->create($_POST['namaDosen'], $_POST['noHP']);
header("Location: viewdosen.php");
exit;
?>
