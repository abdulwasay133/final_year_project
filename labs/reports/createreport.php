

<?php
include "../db.php";
include "../header.php";
session_start();
if($_SESSION['user']['status']){
$user_id = $_SESSION['user']['id'];
$id = $_GET['id'];
// echo $id;
$stmt = $dbpdo->prepare("SELECT * FROM patient_test as pt INNER JOIN patients as p ON pt.pid = p.p_id INNER JOIN test as t ON pt.tid = t.t_id WHERE pt.pid = '$id' AND p.user_id = '$user_id'");
$stmt->execute();
$reports = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<?php
include('../header.php');
?>

  <body>

    <div class="page-wrapper">
    <div class="app-header d-flex align-items-center">

    <?php
include('../topbar.php');
?>
  
      <div class="main-container">

<?php
include('../navbar.php')
?>
 
        <div class="app-container">

          <div class="app-hero-header d-flex align-items-center">

            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <i class="ri-home-8-line lh-1 pe-3 me-3 border-end"></i>
                <a href="index.html">Home</a>
              </li>
              <li class="breadcrumb-item text-primary" aria-current="page">
                Reports
              </li>
              <li class="breadcrumb-item text-primary" aria-current="page">
                Pending Reports
              </li>
              <li class="breadcrumb-item text-primary" aria-current="page">
                Create Report
              </li>
            </ol>

          </div>
  
          <div class="app-body">

            <div class="row gx-3">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Pending Reports</h5>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-end mx-5">
                    
                      <form action="reportall.php" id='myForm' method="GET">
                      <a class='btn btn-primary edit btn-sm' data-bs-toggle='modal' data-bs-target='#modalPhone'><i class="ri-whatsapp-line"></i></a>
                      <button type="submit" class='btn btn-primary edit btn-sm'><i class='ri-printer-fill'></i></button>

                  </div>       
                <div class='col-md-8 mx-auto' id="data">
                <table class="table ">
                            <thead>
                                <th>S.no</th>
                                <th>Test Name</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>Print</th>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($reports as $report){
                                    echo "<tr>
                                    <td >".$report['id']."</td>
                                    <td >".$report['t_name']."</td>
                                    <td >"
                                    ?>
                                    <?php
                                    echo "<div >";
                                    if($report['status']==0){
                                   echo "<span class='badge bg-warning'>Pending</span >";}
                                   else{
                                    echo "<span class='badge bg-success'>Complete</span>";
                                   }
                                    echo "</>"
                                    ?>
                                    </td>
                                    <?php
                                    echo "<td >";
                                    ?>
                                    <?php
                                    if(!$report['status']){
                                   echo "<a class='btn btn-sm btn-primary test' data-bs-toggle='modal' data-bs-target='#modal'   data-trid = '".$report['id']."' data-id = '".$report['t_id']."'><i class='ri-ball-pen-line'></i></a></td>
                                    ";} 
                                    echo "</td><td >";
                                    if($report['status']){
                                    echo "<input type='checkbox' name='reports[]' value=".$report['id']." class='form-check-input' /> ";
                                }
                                    echo "</td></tr>";
                                }
                                ?>
                                <tr>
                                <input type='hidden' id = "trid"  >
                                </tr>
                            </tbody>
                        </table>
                </div>
                
                </form>

                  </div>
                </div>
              </div>
            </div>
  
          </div>




                
          <div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Report</h5>
      </div>
      <div class="modal-body">
      <div id="report"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id='submit'>Save</button>
      </div>
      
    </div>
  </div>
</div>

        </div>


                
          <div class="modal fade" id="modalPhone" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Phone Number</h5>
      </div>
      <div class="modal-body">
        <label for="phone">Enter Whatsapp Number without 0</label>
<input type="text" class="form-control" id='whatsapp' placeholder="3456789000">
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  id="shear">Send</button>
      </div>
      
    </div>
  </div>
</div>

        </div>


 
      </div>
 

    </div>
   
		<?php
include('../footer.php');
		?>
  </body>

</html>


<script>

var shear = document.getElementById('shear');
shear.addEventListener('click',()=>{
  number = document.querySelector('#whatsapp').value;
  var form = document.getElementById('myForm');
  var dataString = $(form).serialize();

msg = encodeURIComponent(`http://localhost/labreport/labs/reports/reportall.php?${dataString}`);

window.location.href = `https://api.whatsapp.com/send?phone=92${number}&text=${msg}`;


})






    
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
                      location.reload()
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


<?php
}else{
  header("Location: http://localhost/labreport/login.php");
}
?>







