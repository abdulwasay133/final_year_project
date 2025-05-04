<?php
include "../db.php";
$id = $_POST['id'];
$type = $_POST['type'];
if($type == 'general'){
$stmt = $dbpdo->prepare("SELECT * FROM test WHERE `t_id` = '$id'");
}elseif ($type == 'custome') {
$stmt = $dbpdo->prepare("SELECT * FROM custome_test WHERE `t_id` = '$id'");
}
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($record);



?>