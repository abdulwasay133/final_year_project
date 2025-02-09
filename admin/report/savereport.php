<?php
include "../db.php";
$trid = $_POST['report'];
$reports = $_POST['reports'];

foreach($reports as $report){
    $id = $report['id'];
    $result = $report['result'];
$stmt = $dbpdo->prepare("INSERT INTO saverecords(`trid`,`subid`,`result`) VALUES('$trid','$id','$result')");
$stmt->execute();
}

$st = $dbpdo->prepare("UPDATE patient_test SET `status` = 1 WHERE `id` = '$trid'");
$st->execute();

// $stm = $dbpdo->prepare("SELECT * FROM test WHERE `t_id` = '$trid'");
// $stm->execute();
// $rep = $stm->fetch(PDO::FETCH_ASSOC);

echo $trid;


?>