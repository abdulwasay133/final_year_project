<?php
include "../db.php";

$start = $_POST['start'];
$end = $_POST['end'];


    $stmt = $dbpdo->prepare("SELECT * FROM patients AS p  JOIN doctors AS d ON p.doctor_id = d.d_id 
    WHERE p.date BETWEEN '$start' AND '$end'");

$stmt->execute();
$records = $stmt->fetchAll();
$output = "";
$total = 0;
foreach($records as $record){
    $total = $total + $record['p_charges'];
$output .= "
<tr>
<td>".$record['p_id']."</td>
<td>".$record['p_name']."</td>
<td>".$record['p_age']."</td>
<td>".$record['p_phone']."</td>
<td>".$record['p_sex']."</td>
<td>".$record['d_name']."</td>
<td>".$record['date']."</td>
<td>".$record['p_charges']."</td>
</tr>
";
}
echo $output; 
?>