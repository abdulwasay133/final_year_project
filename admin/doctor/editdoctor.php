<?php
include "../db.php";
$id = $_POST['id'];

$stm = $dbpdo->prepare("SELECT * FROM doctors WHERE d_id = '$id'");
$stm->execute();
$doctor = $stm->fetch(PDO::FETCH_ASSOC);

$output = "
       <div class='mb-3'>
        <label>Test Name</label>
        <input type='text' class='form-control' id='name' value='{$doctor['d_name']}'>
        <input type='hidden' id='id' value='{$doctor['d_id']}'>
       </div>

       <div class='mb-3'>
        <label>Phone</label>
        <input type='text' class='form-control' id='phone' value='{$doctor['d_phone']}'>
       </div>

       <div class='mb-3'>
        <label>Address</label>
        <input type='text' class='form-control' id='address' value='{$doctor['d_address']}'>
       </div>

    <span class='text-danger' id='error'></span>

 
      </div>
      ";
echo $output;
?>