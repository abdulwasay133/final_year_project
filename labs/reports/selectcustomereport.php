<?php
include "../db.php";
echo "";
$id = $_POST['id'];
$stmt = $dbpdo->prepare("SELECT * FROM custome_test WHERE `t_id` = '$id'");
$stmt->execute();
$results = $stmt->fetchAll();

echo $results[0]['table_html'];

?>