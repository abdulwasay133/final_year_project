<?php
include "../db.php";
$id = $_POST['id'];

$stm = $dbpdo->prepare("SELECT * FROM test WHERE t_id = '$id'");
$stm->execute();
$test = $stm->fetch(PDO::FETCH_ASSOC);

$output = "
       <div class='mb-3'>
        <label>Test Name</label>
        <input type='text' class='form-control' id='name' value='{$test['t_name']}'>
        <input type='hidden' id='id' value='{$test['t_id']}'>
       </div>
<div class='row'>
    
    <div class='col-md-6'>
    <div class='mb-3'>
    Select Category
        <select name='category' id='category' class='form-control'  value='{$test['t_category']}'>
          
        </select>
       </div>
    </div>
    <div class='col-md-6'>
    <div class='mb-3'>
        <label>Short</label>
        <input type='text' class='form-control' id='short' value='{$test['t_short']}'>
       </div>
    </div>

    <div class='col-md-6'>
    <div class='mb-3'>
        <label>Group</label>
        <input type='text' class='form-control' id='group' value='{$test['t_group']}'>
       </div>
    </div>
    <div class='col-md-6'>
    <div class='mb-3'>
        <label>Charges</label>
        <input type='text' class='form-control' id='charges' value='{$test['t_charges']}'>
       </div>
    </div>
    <span class='text-danger' id='error'></span>

</div>  
      </div>
      ";
echo $output;
?>