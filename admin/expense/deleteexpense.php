<?php
include "../db.php";
$id = $_POST['id'];
$stmt = $dbpdo->prepare("DELETE FROM categories WHERE cat_id = '$id'")->execute();
echo 1;


?>