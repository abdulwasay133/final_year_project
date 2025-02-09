<?php
include "../db.php";
$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$age = $_POST['age'];
$sex = $_POST['sex'];
$doctor = $_POST['doctor'];
$reports = $_POST['reports'];
$charges = $_POST['charges'];
date_default_timezone_set('Asia/Karachi');
$date = date('Y-m-d H:i:s', time());
if($id > 0){
    $stmt = $dbpdo->prepare("UPDATE patients SET `p_name` = '$name', `p_phone` = '$phone', `p_age` = '$age',`p_sex` = '$sex',`doctor_id`,`p_charges` = $doctor WHERE p_id = '$id'")->execute();
    echo 1;
}else{
    
    $stmt = $dbpdo->prepare("INSERT INTO patients(`p_id`,`p_name`,`p_phone`,`p_age`,`p_sex`,`doctor_id`,`p_status`,`p_charges`,`date`) VALUES(Null,'$name','$phone','$age','$sex','$doctor',0,'$charges','$date')");
    $stmt->execute();
    $patient = $dbpdo->lastInsertId();
    foreach($reports as $report){
        $tid = $report['t_id'];
        $pid = $patient;
        $stmt = $dbpdo->prepare("INSERT INTO patient_test(`id`,`pid`,`tid`,`status`) VALUES(Null,'$pid','$tid',0)")->execute();
    }
    echo  $patient;
}
?>