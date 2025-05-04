<?php
include "../db.php";
$id = $_POST['id'];
$name = $_POST['name'];
$short = $_POST['short'];
$group = $_POST['group'];
$charges = $_POST['charges'];
// echo $group;

$stmt = $dbpdo->prepare("UPDATE custome_test SET `name` = '$name', `shortName` = '$short', `grouping` = '$group',`charges`='$charges' WHERE id = '$id'")->execute();
    echo  1;

?>