<?php
include "../db.php";
$trid = $_POST['report'];
$reports = $_POST['reports'];
$test_report_id = $_POST['test_report_id'];

foreach($reports as $report){
    $id = $report['id'];
    $result = $report['result'];
$stmt = $dbpdo->prepare("INSERT INTO saverecords(`trid`,`subid`,`result`,`type`) VALUES('$test_report_id','$id','$result','general')");
$stmt->execute();
}

$st = $dbpdo->prepare("UPDATE patient_test SET `status` = 1 WHERE `id` = '$test_report_id'");
$st->execute();

// $stm = $dbpdo->prepare("SELECT * FROM test WHERE `t_id` = '$trid'");
// $stm->execute();
// $rep = $stm->fetch(PDO::FETCH_ASSOC);

echo $trid;


?>