<?php
include "../db.php";
include "../header.php";
session_start();
if($_SESSION['user']){

$id = $_GET['id'];
// echo $id;
$stmt = $dbpdo->prepare("SELECT * FROM patient_test as pt INNER JOIN patients as p ON pt.pid = p.p_id INNER JOIN test as t ON pt.tid = t.t_id WHERE pt.pid = '$id' AND pt.status = 0");
$stmt->execute();
$reports = $stmt->fetchAll();
?>
<body class="p-0 m-0">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-dark text-light"><h4>All Reports</h4></div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>S.no</th>
                                <th>Test Name</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($reports as $report){
                                    echo "<tr>
                                    <td>".$report['id']."</td>
                                    <td>".$report['t_name']."</td>
                                    <td><button class='btn btn-sm btn-primary test' data-trid = '".$report['id']."' data-id = '".$report['t_id']."'>+</button></td>
                                </tr>";
                                }
                                ?>
                                <tr>
                                <input type='hidden' id = "trid"  >
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-dark text-light"><h4>Add Result</h4></div>
                    <div class="card-body">
                        <div id="report"></div>
                        <button class='btn btn-primary' id='submit'>Save & Print</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
 }else{
  header("Location: http://localhost/labreport/login.php");
}
?>
<script>
    values = [];
    btn = document.querySelector('#submit');
    btn.addEventListener('click',e=>{
        inputs = document.querySelectorAll('.result');
        for(input of inputs){
            id = input.dataset.id;
            result = input.value;
            values.push({id: id,result: result});
        }
        submitreport();
    })
    function submitreport(){
            report = document.querySelector("#trid").value;
            console.log(report);
            $.ajax({
                url:"savereport.php",
                type:"POST",
                data:{report:report,reports:values},
                success:function(data){
                    console.log(data);
                    if(data > 0){
                        a = document.createElement('a');
                        a.href=`report.php?id=${data}`;
                        a.click();
                    }else{
                        alert("Error Found Record Not Save!");
                    }
                }
            })
        }
    $(document).ready(function(){
        $(document).on('click', '.test', function() { 
                id = $(this).data('id');
                trid = $(this).data('trid');
                element = this;
                rep = $("#trid").val(trid) ;
                $.ajax({
                    url : 'selectreport.php',
                    type : 'POST',
                    data : {id : id},
                    success : function (data){
                        $("#report").html(data);
                    }
                })
            
             });
    })
</script>