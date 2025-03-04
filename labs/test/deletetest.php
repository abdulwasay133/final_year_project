<?php
include "../db.php";
$id = $_POST['id'];
$stmt = $dbpdo->prepare("DELETE FROM test WHERE t_id = '$id'")->execute();
echo 1;


?>