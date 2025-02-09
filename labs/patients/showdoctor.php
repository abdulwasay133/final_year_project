<?php
include "../db.php";
session_start();
$user_id = $_SESSION['user']['id'];

$stmt = $dbpdo->prepare("SELECT * FROM doctors WHERE user_id = $user_id");
$stmt->execute();
$doctors = $stmt->fetchAll();
$output = "<option value=''>Select Doctor</option>";
foreach($doctors as $doctor){
    $output .= "<option value='{$doctor['d_id']}'>{$doctor['d_name']}</option>";
}
echo $output;

?>