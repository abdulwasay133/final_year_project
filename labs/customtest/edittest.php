<?php
include "../db.php";
$id = $_POST['id'];

$stm = $dbpdo->prepare("SELECT * FROM custome_test WHERE id = '$id'");
$stm->execute();
$test = $stm->fetch(PDO::FETCH_ASSOC);

$output = "
       <div class='mb-3'>
        <label>Test Name</label>
        <input type='text' class='form-control' id='name' value='{$test['name']}'>
        <input type='hidden' id='id' value='{$test['id']}'>
       </div>
<div class='row'>
    

    <div class='col-md-6'>
    <div class='mb-3'>
        <label>Short</label>
        <input type='text' class='form-control' id='short' value='{$test['shortName']}'>
       </div>
    </div>

    <div class='col-md-6'>
    <div class='mb-3'>
        <label>Group</label>
        <input type='text' class='form-control' id='group' value='{$test['grouping']}'>
       </div>
    </div>
    <div class='col-md-12'>
    <div class='mb-3'>
        <label>Charges</label>
        <input type='text' class='form-control' id='charges' value='{$test['charges']}'>
       </div>
    </div>
    <span class='text-danger' id='error'></span>

</div>  
      </div>
      ";
echo $output;
?>