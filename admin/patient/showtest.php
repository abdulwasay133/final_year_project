<?php
include "../db.php";

$stmt = $dbpdo->prepare('SELECT * FROM test');
$stmt->execute();
$tests = $stmt->fetchAll();
$output = "<option value=''>Select Test</option>";
foreach($tests as $test){
    $output .= "<option value='{$test['t_id']}'>{$test['t_name']}</option>";
}
echo $output;

?>