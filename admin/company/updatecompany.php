<?php
include "../db.php";

$id = $_POST['id'];
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$website = $_POST['website'];
$address = $_POST['address'];

$stmt = $dbpdo->prepare("UPDATE company SET `name` = '$name',`mobile` = '$mobile',`website` = '$website',`address` = '$address' WHERE `id`= '$id'");
$stmt->execute();
echo 1;


?>