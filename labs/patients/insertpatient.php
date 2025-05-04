<?php

use function PHPSTORM_META\type;

include "../db.php";
session_start();
$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$age = $_POST['age'];
$sex = $_POST['sex'];
$doctor = $_POST['doctor'];
$reports = $_POST['reports'];
$charges = $_POST['charges'];
$cnic = $_POST['cnic'];
$user_id = $_SESSION['user']['id'];
date_default_timezone_set('Asia/Karachi');
$date = date('Y-m-d H:i:s', time());
if($id > 0){
    $stmt = $dbpdo->prepare("UPDATE patients SET `p_name` = '$name', `p_phone` = '$phone', `p_age` = '$age',`p_sex` = '$sex',`doctor_id`,`p_charges` = $doctor WHERE p_id = '$id'")->execute();
    echo 1;
}else{
    
    $stmt = $dbpdo->prepare("INSERT INTO patients(`p_id`,`p_name`,`p_phone`,`p_age`,`p_sex`,`doctor_id`,`p_status`,`p_charges`,`user_id`,`p_cnic`,`date`) VALUES(Null,'$name','$phone','$age','$sex','$doctor',0,'$charges','$user_id','$cnic','$date')");
    $stmt->execute();
    $patient = $dbpdo->lastInsertId();
    $type = "";
    foreach($reports as $report){
        $tid = $report['t_id'];
        
        if(array_key_exists('table_html', $report)){
            $type = "custome";
        }else{
            $type= "general";
        }
        $pid = $patient;
        $stmt = $dbpdo->prepare("INSERT INTO patient_test(`id`,`pid`,`tid`,`status`,`type`) VALUES(Null,'$pid','$tid',0,'$type')")->execute();
    }
    echo $patient;
}
?>