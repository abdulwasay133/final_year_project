<?php
include "../db.php";
session_start();
$user_id = $_SESSION['user']['id'];
$id = $_POST['id'];
$amount = $_POST['amount'];
$date = $_POST['date'];
$description = $_POST['description'];
if($id > 0){
    $stmt = $dbpdo->prepare("UPDATE expense SET `amount` = '$amount',`date` = '$date',`description` = '$description' WHERE id = '$id'")->execute();
    echo 1;
}else{
    $stmt = $dbpdo->prepare("INSERT INTO expense(`id`,`amount`,`date`,`description`,`user_id`) VALUES(Null,'$amount','$date','$description','$user_id')")->execute();
    echo  1;
}
?>