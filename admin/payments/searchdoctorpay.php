<?php
include "../db.php";

$doctor = $_POST['doctor'];
$start = $_POST['start'];
$end = $_POST['end'];
// echo $doctor;
if($doctor == "-1"){
    $stmt = $dbpdo->prepare("SELECT * FROM patients AS p JOIN doctors AS d ON p.doctor_id = d.d_id 
    WHERE p.date BETWEEN '$start' AND '$end'");
}
else{
    $stmt = $dbpdo->prepare("SELECT * FROM patients AS p  JOIN doctors AS d ON p.doctor_id = d.d_id 
    WHERE  p.doctor_id = '$doctor' AND  p.date BETWEEN '$start' AND '$end'");
}
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
<td>".$record['d_name']."</td>
<td>".$record['date']."</td>
<td>".$record['p_charges']."</td>
</tr>
";
}
$output .= "<tr>
<td></td>
<td><h5>Total Charges</h5></td>
<td><h5 id='total'>".$total."</h5></td>
<td><input type='text' class='form-control w-50' id='comm' placeholder='Value in % '></td>
<td><button class='btn btn-dark btn-sm' onclick='calculate()'>Calculate</button></td>
</tr>";
echo $output; 
?>