<?php
include "../db.php";
$id = $_POST['id'];
$amount = $_POST['amount'];
$date = $_POST['date'];
$description = $_POST['description'];
if($id > 0){
    $stmt = $dbpdo->prepare("UPDATE expense SET `amount` = '$amount',`date` = '$date',`description` = '$description' WHERE id = '$id'")->execute();
    echo 1;
}else{
    $stmt = $dbpdo->prepare("INSERT INTO expense(`id`,`amount`,`date`,`description`) VALUES(Null,'$amount','$date','$description')")->execute();
    echo  1;
}
?>