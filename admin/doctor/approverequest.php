<?php
include '../db.php';
$id = $_POST['id'];
$stmt = $dbpdo->prepare("UPDATE doctors SET `status` = 1 WHERE d_id = '$id'")->execute();
echo 1;

?>