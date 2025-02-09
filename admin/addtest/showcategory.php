<?php
include "../db.php";

$stmt = $dbpdo->prepare('SELECT * FROM categories');
$stmt->execute();
$categories = $stmt->fetchAll();
$output = "<option value=''>Select Category</option>";
foreach($categories as $category){
    $output .= "<option value='{$category['cat_id']}'>{$category['cat_name']}</option>";
}
echo $output;

?>