<?php
include "../db.php";
$id = $_POST['id'];
echo $id;
$stmt = $dbpdo->prepare("SELECT * FROM doctors WHERE `d_district` = '$id'");
$stmt->execute();
$doctors = $stmt->fetchAll();

$output = "<select name='district' id='test'  class='form-control'> <option value=''>Select District</option>";

foreach($doctors as $doctor){
    if($doctor['status'] = true)
    $output .= "<option value={$doctor['d_id']} > {$doctor['d_name']} </option>";
}
$output .="</select>";
echo $output;

?>