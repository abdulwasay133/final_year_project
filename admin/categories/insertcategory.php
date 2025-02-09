<?php
include "../db.php";
$id = $_POST['id'];
$name = $_POST['name'];
if($id > 0){
    $stmt = $dbpdo->prepare("UPDATE categories SET `cat_name` = '$name' WHERE cat_id = '$id'")->execute();
    echo 1;
}else{
    $stmt = $dbpdo->prepare("INSERT INTO categories(`cat_id`,`cat_name`) VALUES(Null,'$name')")->execute();
    echo  1;
}
?>