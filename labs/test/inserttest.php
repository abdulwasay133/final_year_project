<?php
include "../db.php";
$id = $_POST['id'];
$name = $_POST['name'];
$short = $_POST['short'];
$category = $_POST['category'];
$group = $_POST['group'];
$charges = $_POST['charges'];
if($id > 0){
    $stmt = $dbpdo->prepare("UPDATE test SET `t_name` = '$name', `t_short` = '$short', `t_group` = '$group', `t_category` = '$category',`t_charges`='$charges' WHERE t_id = '$id'")->execute();
    echo 1;
}else{
    $stmt = $dbpdo->prepare("INSERT INTO test(`t_id`,`t_name`,`t_category`,`t_group`,`t_short`,`t_charges`) VALUES(Null,'$name','$category','$group','$short','$charges')")->execute();
    echo  1;
}
?>