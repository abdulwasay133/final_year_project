<?php 

include "../db.php";
$id = $_GET['id'];

$update = $dbpdo->prepare("UPDATE patients SET `p_status` = 1 WHERE `p_id` = '$id'");
$update->execute();


$p = "SELECT * FROM patient_test AS pt JOIN test as t ON pt.tid = t.t_id WHERE pid = '$id'";
$test = $dbpdo->prepare($p);
$test->execute();
$tests = $test->fetchAll();

$pt = "SELECT * FROM patients as p JOIN doctors AS d ON d.d_id = p.doctor_id WHERE p_id = '$id'";
$patient = $dbpdo->prepare($pt);
$patient->execute();
$patients = $patient->fetchAll();



$records = [];
foreach($tests as $test){
    $testid = $test['tid'];
    $tstid = $test['id'];
    $q = "SELECT * FROM saverecords AS sr  
    JOIN patient_test as pt ON pt.id = sr.trid
    JOIN test AS t ON pt.tid = t.t_id
    JOIN categories AS c ON c.cat_id = t.t_category
    JOIN subtest as st ON st.id = sr.subid
    WHERE sr.trid = '$tstid'";
    $stmt = $dbpdo->prepare($q);
    $stmt->execute();
    $record = $stmt->fetchAll();
    array_push($records,$record);
}


$stm = $dbpdo->prepare("SELECT * FROM company where id = 1");
$stm->execute();
$comp = $stm->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
	<link rel="stylesheet" href="../asset/icons/bootstrap-icons.min.css">
	<link rel="stylesheet" href="../asset/style.css">
	<link rel="stylesheet" href="../asset/fontawesome.min.css">
	<script src="../asset/js/bootstrap.bundle.min.js"></script>
	<script src="../asset/js/jquery.min.js"></script>
	<script src="../asset/qrcode.min.js"></script>
	<script src="../asset/apexcharts.js"></script>
	<script src="../asset/JsBarcode.code128.min.js"></script>
    <title>Lab Report</title>
    <style>
@media print
{
  table { page-break-inside:avoid; }
  tr    { page-break-inside:avoid; page-break-after:auto }
  td    { page-break-inside:avoid; page-break-after:auto }
  thead { display:table-header-group }
  tfoot { display:table-footer-group }
}
@page { size: auto;  margin-top: 0;margin-bottom: 0; }

table{
    font-size: 88%;
}
#barcode{
    width: 100px;
    display:inline;
}
</style>
</head>

<body onload='window.print()'>


<table class="">
    <thead>
        <tr >
    <th colspan='4'><img class="img-responsive " src="../asset/header.png" class="w-100" style="width: 100%;"></th>
        </tr>
        <tr style='border-bottom:2px solid black'>
            <th  colspan = '1' >
                <b>Patient ID : </b><span  id="patient"> <?php echo $patients[0]['p_id']; ?> </span> <br>
                <b>Patient Name : </b><span   id="name"> <?php echo $patients[0]['p_name']; ?></span> <br>
                <b>Referred by : </b><span id="doctor"> <?php echo $patients[0]['d_name']; ?></span><br>
                <b>Required Test : </b><span id="doctor"> <?php foreach($tests as $tes ){ echo $tes['t_name'].",";} ?></span>
            </th>
            <th colspan = '1'>
                <b>Age : </b><span id="age"> <?php echo $patients[0]['p_age']; ?> Y</span><br>
                <b>Date: </b><span id="date"><?php echo date("d,M,Y g:i a",strtotime($patients[0]['date']));  ?></span><br>
                <b>Sex : </b><span id="sex"> <?php echo $patients[0]['p_sex']; ?> </span><br>
                <b>Contact : </b><span id="sex"> <?php echo $patients[0]['p_phone']; ?> </span><br>
            </th>
            <th colspan = '1'>
            <img id="barcode">
            </th>
        </tr>
    </thead>
        <tr>
            <td colspan="4">
                
        <?php
            foreach($records as $recors){
                ?>
                <table  class="table table-striped w-75">
       
                <?php
if($recors[0]['high']!= 0){
 
        echo "<thead>
            <th colspan='3'>".$recors[0]['cat_name'] ."</th>
            <th colspan='1' class='qrcod' data-qrid='".  $recors[0]['id'] ."'></th>
            <tr>
            <th>Name</th>
            <th>Refrange</th>
            <th>Unit</th>
            <th>Result</th>
            </tr>
        </thead> <tbody>";

        
            foreach($recors as $rec){
                if($rec['refrange'] == "head")
                {
                    echo "<tr>
                    <td colspan='4' class='text-center fs-6'><b>".$rec['sub_name']."</b></td>
                    </tr>";

                }else{
                echo "<tr>
                <td>".$rec['sub_name']."</td>
                <td>".$rec['refrange']."</td>
                <td>".$rec['unit']."</td>
                <td>".$rec['result']."</td>
                </tr>";
                if($rec['other']!=""){
                    echo "<tr>
                    <td colspan='4'>".$rec['other']."</td>
                    </tr>";
                } 
                } 
            }
       
        echo "</tbody>";
    }elseif( $recors[0]['high']== 0){
         
        echo "<thead>
            <th colspan='3'>".$recors[0]['cat_name'] ."</th>
            <th colspan='1' class='qrcod' data-qrid='".  $recors[0]['id'] ."'></th>
            <tr>
            <th>Title</th>
            <th>Result</th>
            </tr>
        </thead> <tbody>";

        
            foreach($recors as $rec){
                if($rec['refrange'] == "head")
                {
                    echo "<tr>
                    <td colspan='2' class='text-center fs-6'><b>".$rec['sub_name']."</b></td>
                    </tr>";

                }else{
                    echo "<tr>
                    <td>".$rec['sub_name']."</td>
                    <td>".$rec['result']."  &ensp;  ". $rec['unit']."</td>
                    </tr>";
                    if($rec['other']!=""){
                        echo "<tr>
                        <td colspan='2'>".$rec['other']."</td>
                        </tr>";
                    }
                    
          
                    
                }

            }
       
        echo "</tbody>";

    }
    }
        ?>
        </table>
        </td>
        </tr>
</table>



            
</body>
<script>

let qrcodes = document.querySelectorAll(".qrcod");


    qrcodes.forEach(element => {
        console.log(element.innerHTML);
        element.innerHTML
        
        var qrcode = new QRCode(element, {
        text: element.dataset.qrid,
        width: 30,
        height: 30
    });
    });
    

  


patient = document.querySelector('#patient').textContent
element = document.querySelector('#barcode');
JsBarcode(element,"report"+ patient);
</script>