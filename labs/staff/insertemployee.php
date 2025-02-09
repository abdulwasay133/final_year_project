<?php
include "../db.php";
session_start();
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$designation = $_POST['designation'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$user_id = $_SESSION['user']['id'];
if($id > 0){
    $stmt = $dbpdo->prepare("UPDATE staff SET `name` = '$name', `phone` = '$phone', `address` = '$address',`email`= '$email',`password`='$password',`designation`='$designation' WHERE id = '$id'")->execute();
    echo 1;
}else{
    $stmt = $dbpdo->prepare("INSERT INTO staff(`id`,`name`,`phone`,`address`,`user_id`,`email`,`password`,`designation`) VALUES(Null,'$name','$phone','$address','$user_id','$email','$password','$designation')")->execute();
    echo  1;
}
?>