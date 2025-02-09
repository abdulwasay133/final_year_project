<?php
include "../db.php";

$stmt = $dbpdo->prepare('SELECT * FROM categories');
$stmt->execute();
$doctors = $stmt->fetchAll();
$output = "<option value=''>Select Category</option>";
foreach($doctors as $doctor){
    $output .= "<option value='{$doctor['cat_id']}'>{$doctor['cat_name']}</option>";
}
echo $output;

?>