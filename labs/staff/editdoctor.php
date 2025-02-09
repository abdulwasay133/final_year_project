<?php
include "../db.php";
$id = $_POST['id'];

$stm = $dbpdo->prepare("SELECT * FROM staff WHERE id = '$id'");
$stm->execute();
$employee = $stm->fetch(PDO::FETCH_ASSOC);

$output = "
       <div class='mb-3'>
        <label>Employee name</label>
        <input type='text' class='form-control' id='name' value='{$employee['name']}'>
        <input type='hidden' id='id' value='{$employee['id']}'>
       </div>

       <div class='mb-3'>
        <label>Email</label>
        <input type='email' class='form-control' id='email' value='{$employee['email']}'>
       </div>

       <div class='mb-3'>
        <label>Password</label>
        <input type='text' class='form-control' id='password' value='{$employee['password']}'>
       </div>

       <div class='mb-3'>
        <label>Phone</label>
        <input type='text' class='form-control' id='phone' value='{$employee['phone']}'>
       </div>

       <div class='mb-3'>
        <label>Address</label>
        <input type='text' class='form-control' id='address' value='{$employee['address']}'>
       </div>

       <div class='mb-3'>
       <label>Designation</label>
       <select name='designation' id='designation' class='form-control' value='{$employee['designation']}'>
          <option value='admin'>Admin</option>
          <option value='cashear'>Cashear</option>
          <option value='doctor'>Doctor</option>
          <option value='accounts'>Accounts</option>
        </select>
        </div>
    <span class='text-danger' id='error'></span>

 
      </div>
      ";
echo $output;
?>