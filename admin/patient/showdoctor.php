<?php
include "../db.php";

$stmt = $dbpdo->prepare('SELECT * FROM doctors');
$stmt->execute();
$doctors = $stmt->fetchAll();
$output = "<option value=''>Select Doctor</option>";
foreach($doctors as $doctor){
    $output .= "<option value='{$doctor['d_id']}'>{$doctor['d_name']}</option>";
}
echo $output;

?>