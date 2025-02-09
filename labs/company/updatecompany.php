<?php
include "../db.php";

session_start();
$user_id = $_SESSION['user']['id'];
$name = $_POST['labname'];
$mobile = $_POST['phone'];
$website = $_POST['website'];
$dob = $_POST['dob'];
$owner = $_POST['own_name'];
$address = $_POST['address'];
$email = $_POST['email'];
$reg_no = $_POST['reg_no'];

$stmt = $dbpdo->prepare("INSERT INTO company(`id`,`user_id`,`name`,`mobile`,`website`,`email`,`reg_no`,`owner_name`,`dob`,`address`) VALUES(NULL,'$user_id','$name','$mobile','$website','$email','$reg_no','$owner','$dob','$address')");
$stmt->execute();

header('location: http://localhost/labreport/labs/');


?>