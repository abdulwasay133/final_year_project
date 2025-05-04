<?php
include "db.php";
session_start();

$email = $_POST['email'];
$pass = $_POST['pass'];

$stmt = $dbpdo->prepare("SELECT * FROM admins WHERE (`email` = '$email' AND `password` = '$pass')");
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if($user['status']== true){
 $_SESSION['user'] = $user;
 header("Location: http://localhost/labreport/labs/");
}else{
    header("Location: http://localhost/labreport/login.php");
}

?>