<?php
include "../db.php";

$stmt = $dbpdo->prepare("SELECT * FROM company WHERE `id` = '1' ");
$stmt->execute();
$comp = $stmt->fetch(PDO::FETCH_ASSOC);
$output = "                    <div class='mb-3'>

                                <div class='col-md-12'>
                                    Company Name
                                    <input type='text' class='form-control' id='name' name='name' value='{$comp['name']}'>
                                    <input type='hidden' class='form-control' id='id' name='id' value='{$comp['id']}'>
                                </div>



                            <div class='row mt-3'>
                                <div class='col-md-6'>
                                    Mobile Number
                                    <input type='text' class='form-control' id='mobile' name='mobile' value='{$comp['mobile']}'>
                                </div>


                                <div class='col-md-6'>
                                    Website
                                    <input type='text' class='form-control' id='website' name='website' value='{$comp['website']}'>
                                </div>

                            </div>
                            <div class='row'>
                                <div class='col-md-9'>
                                    Address
                                    <input type='text' class='form-control' id='address' name='address' value='{$comp['address']}'>
                                </div>
                             ";
echo $output
?>