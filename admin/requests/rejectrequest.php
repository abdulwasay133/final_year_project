<?php
include '../db.php';
$id = $_POST['id'];
$stmt = $dbpdo->prepare("DELETE FROM company WHERE user_id = '$id'")->execute();
echo 1;

?>