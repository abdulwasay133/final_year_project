<?php
include "../db.php";

$id = $_POST['id'];
$stmt = $dbpdo->prepare("SELECT * FROM test WHERE id = '$id'");
$stmt->execute();
$test = $stmt->fetch(PDO::FETCH_ASSOC);
$output = "<div class='mb-3'>
Short
<input type='text' class='form-control' id='sname' value='{$test['sname']}' readonly>
<input type='text' id='name' value='{$test['name']}' hidden>
<input type='text' id='unit' value='{$test['unit']}' hidden>
</div>
<div class='mb-3'>
Normal Values
<input type='text' class='form-control' id='range' value='{$test['min']}___{$test['max']}' readonly>
</div>
<div class='mb-3'>
Add Result
<input type='text' class='form-control' id='result'>
</div>
";
echo $output;
?>