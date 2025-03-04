<?php
include "../db.php";
$t_name = $_POST['t_name'];
$t_category = $_POST['t_category'];
$t_group = $_POST['t_group'];
$t_short = $_POST['t_short'];
$reports = $_POST['reports'];
$t_charges = $_POST['t_charges'];

    $stmt = $dbpdo->prepare("INSERT INTO test(`t_id`,`t_name`,`t_category`,`t_group`,`t_short`,`t_charges`)
     VALUES(Null,'$t_name','$t_category','$t_group','$t_short','$t_charges')");
    $stmt->execute();
    $test = $dbpdo->lastInsertId();
    foreach($reports as $report){
        $sn = $report['sub_name'];
        $low = $report['min'];
        $high = $report['max'];
        $unit = $report['unit'];
        $refrange = $report['refrange'];
        $tid = $test;
        $stm = $dbpdo->prepare("INSERT INTO subtest(`id`,`tid`,`sub_name`,`refrange`,`low`,`high`,`unit`) VALUES(Null,'$tid','$sn','$refrange','$low','$high','$unit')");
        $stm->execute();
    }
    echo  1;

?>