<?php
include "../db.php";
$id = $_POST['id'];

$stm = $dbpdo->prepare("SELECT * FROM patients WHERE id = '$id'");
$stm->execute();
$patient = $stm->fetch(PDO::FETCH_ASSOC);

$output = "


       <div class='mb-3'>
        <label>Patient Name</label>
        <input type='text' class='form-control' id='name' value='{$patient['pname']}'>
        <input type='hidden' id='id' value='{$patient['id']}'>
       </div>

       <div class='mb-3'>
        <label>Phone</label>
        <input type='text' class='form-control' id='phone' value='{$patient['pphone']}'>
       </div>

       <div class='row'>
        <div class='col-md-6'>
        <div class='mb-3'>
        <label>Age</label>
        <input type='text' class='form-control' id='age' value='{$patient['age']}'>
       </div>
        </div>

        <div class='col-md-6'>
        <div class='mb-3'>
        <label>Sex</label>
        <input type='text' class='form-control' id='sex' value='{$patient['sex']}'>
       </div>
        </div>
       </div>


        <div class='mb-3'>
        <select name='doctor' id='doctor' class='form-control' value='{$patient['doctor_id']}'>
        </select>
       </div>

    
    
    <span class='text-danger' id='error'></span>

 
      </div>
      ";
echo $output;
?>