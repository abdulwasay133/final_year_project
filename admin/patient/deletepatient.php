<?php
include "../db.php";
$pid = $_POST['pid'];
$rstmt = $dbpdo->prepare("DELETE FROM patient_test WHERE pid = '$pid'")->execute();
if($rstmt){
    $stmt = $dbpdo->prepare("DELETE FROM patients WHERE p_id = '$pid'")->execute();
}
echo 1;


?>