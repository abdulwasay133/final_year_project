<?php
include "../db.php";
$id = $_POST['id'];
$stmt = $dbpdo->prepare("SELECT * FROM test WHERE `t_id` = '$id'");
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($record);



?>