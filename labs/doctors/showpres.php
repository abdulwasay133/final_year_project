<?php

include "../db.php";

$id = $_POST['id'];
$stmt = $dbpdo->prepare("SELECT * FROM prescriptions AS pre JOIN doctors AS d ON pre.doctor_id = d.d_id WHERE patient_id = '$id' ");
$stmt->execute();
$prec = $stmt->fetchAll();

$output = "<div class='card'>
    <div class='card-body'>
        <div class='d-flex justify-content-around'> <div class='px-5 py-3 rounded shadow'> <h4>Date: </h4><b> {$prec[0]['date']} </b></div>    <div class='px-5 py-3 rounded shadow'>    <h4>Doctor: </h4><b> {$prec[0]['d_name']}</b> </div> </div>
        <p></p>
        <p class='mt-3'> <h4> Prescription: </h4> {$prec[0]['prescription']}</p>
    </div>

</div>";
 
echo $output;
?>
