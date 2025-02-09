<?php
include "../db.php";

$stmt = $dbpdo->prepare("SELECT * FROM test");
$stmt->execute();
$tests = $stmt->fetchAll();
$output = "<select name='report' id='report' class='form-control'>";
foreach($tests as $test){
$output .="<option value='{$test['id']}'>{$test['name']}</option>";
}
$output .= "</select>";

echo $output;

?>