<?php
session_start();
$content = $_POST['content'];
$id = $_POST['id'];
$doc = $_SESSION['user']['d_id'];
$date = date('Y-m-d H:i:s');
include "../db.php";

$stmt = $dbpdo->prepare("INSERT INTO prescriptions(`id`,`patient_id`,`doctor_id`,`prescription`,`date`) 
values(Null,'$id','$doc','$content','$date')");
$stmt->execute();
echo "Prescription Added";
?>