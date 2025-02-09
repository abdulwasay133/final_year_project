<?php
include "../db.php";
$id = $_POST['id'];

$stm = $dbpdo->prepare("SELECT * FROM categories WHERE cat_id = '$id'");
$stm->execute();
$category = $stm->fetch(PDO::FETCH_ASSOC);

$output = "
       <div class='mb-3'>
        <label>Test Name</label>
        <input type='text' class='form-control' id='name' value='{$category['cat_name']}'>
        <input type='hidden' id='id' value='{$category['cat_id']}'>
       </div>
<div class='row'>
    
    <span class='text-danger' id='error'></span>

</div>  
      </div>
      ";
echo $output;
?>