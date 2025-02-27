<?php
include "admin/db.php";
$id = $_POST['id'];

$stmt = $dbpdo->prepare("SELECT * FROM districts WHERE `province_id` = '$id'");
$stmt->execute();
$districts = $stmt->fetchAll();

$output = "<select name='district' id='test'  class='form-control'> <option value=''>Select District</option>";

foreach($districts as $district){
    $output .= "<option value={$district['id']} > {$district['name']} </option>";
}
$output .="</select>";
echo $output;

?>