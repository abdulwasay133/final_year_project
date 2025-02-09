<?php
include "db.php";
session_start();

$email = $_POST['email'];
$pass = $_POST['pass'];
echo $pass;
$stmt = $dbpdo->prepare("SELECT * FROM admins WHERE (`email` = '$email' AND `password` = '$pass')");
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
print_r($user);
 $_SESSION['user'] = $user;
//  header("Location: http://localhost/labreport/admin/");


?>