<?php
require_once 'ClassDosen.php';
$dosen = new Dosen();
$dosen->update($_POST['id'], $_POST['namaDosen'], $_POST['noHP']);
header("Location: viewdosen.php");
exit;
?>
