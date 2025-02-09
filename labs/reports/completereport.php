<?php 

include "../db.php";
$id = $_GET['id'];

echo $id;

$update = $dbpdo->prepare("UPDATE patients SET `p_status` = 1 WHERE `p_id` = '$id'");
$update->execute();
header("Location: localhost:labreport/labs/reports/");

?>