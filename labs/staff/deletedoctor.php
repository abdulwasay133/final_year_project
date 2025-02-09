<?php
include "../db.php";
$id = $_POST['id'];
$stmt = $dbpdo->prepare("DELETE FROM staff WHERE id = '$id'")->execute();
echo 1;


?>