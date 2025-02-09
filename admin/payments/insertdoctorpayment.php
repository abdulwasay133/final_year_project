<?php
include "../db.php";
date_default_timezone_set('Asia/Karachi');
$date = date('Y-m-d H:i:s', time());
$amount = $_POST['pay'];
$doctor = $_POST['doctor'];
$des = "Doctor Payment";
$stmt = $dbpdo->prepare("INSERT INTO doctorpayment(`id`,`date`,`amount`,`doctor_id`,`description`) VALUES(Null , '$date','$amount','$doctor','$des')");
$stmt->execute();
echo 1;

?>