<?php
include '../db.php';
$id = $_POST['id'];
$stmt = $dbpdo->prepare("UPDATE users SET `status` = 1 WHERE id = '$id'")->execute();
echo 1;

?>