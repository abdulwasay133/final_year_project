<?php
include "../db.php";
$id = $_POST['id'];

$stm = $dbpdo->prepare("SELECT * FROM expense WHERE id = '$id'");
$stm->execute();
$expense = $stm->fetch(PDO::FETCH_ASSOC);

$output = "

       <div class='mb-3'>
        <label>Amount</label>
        <input type='text' class='form-control' id='amount' value = '{$expense['amount']}'>
        <input type='hidden' id='id' value = '{$expense['id']}'>
       </div>
       <div class='mb-3'>
        <label>Date</label>
        <input type='date' class='form-control' id='date' value = '{$expense['date']}'>
       </div>
       <div class='mb-3'>
        <label>Description</label>
        <input name='description' id='description' class='form-control' value = '{$expense['description']}'>
       </div>
<div class='row'>
    <span class='text-danger' id='error'></span>
</div>  



      ";
echo $output;
?>