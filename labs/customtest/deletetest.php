<?php
include "../db.php";
$id = $_POST['id'];
$stmt = $dbpdo->prepare("DELETE FROM custome_test WHERE id = '$id'")->execute();
echo 1;


?>