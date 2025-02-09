<?php
include "../db.php";
session_start();
$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$user_id = $_SESSION['user']['id'];

if($id > 0){
    $stmt = $dbpdo->prepare("UPDATE doctors SET `d_name` = '$name', `d_phone` = '$phone', `d_address` = '$address' WHERE d_id = '$id'")->execute();
    echo 1;
}else{
    $stmt = $dbpdo->prepare("INSERT INTO doctors(`d_id`,`d_name`,`d_phone`,`d_address`,`user_id`) VALUES(Null,'$name','$phone','$address','$user_id')")->execute();
    echo  1;
}
?>