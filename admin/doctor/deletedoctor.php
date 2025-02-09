<?php
include "../db.php";
$id = $_POST['id'];
$stmt = $dbpdo->prepare("DELETE FROM doctors WHERE d_id = '$id'")->execute();
echo 1;


?>