<?php
include "../db.php";

$stmt = $dbpdo->prepare('SELECT * FROM doctors');
$stmt->execute();
$records = $stmt->fetchAll();
$output = "<option value = '-1'>All</option>";
foreach($records as $record){
    $output .="<option value ='".$record['d_id']."'>".$record['d_name']."</option>";
}

echo $output;
?>