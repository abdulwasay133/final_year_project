
<link href="../assets/quill.snow.css" rel="stylesheet" />

<?php
include "../db.php";
include "../header.php";
session_start();
if($_SESSION['user']['status']==true){

$id = $_GET['id'];
// iecho $d;
$stmt = $dbpdo->prepare("SELECT * FROM patient_test as pt INNER JOIN patients as p ON pt.pid = p.p_id INNER JOIN test as t ON pt.tid = t.t_id WHERE pt.pid = '$id' AND pt.status = 1");
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

                              
                <div class='col-md-8 mx-auto' id="data">

                <form action="../reports/reportall.php" id='myForm' method="GET">
                <div class="d-flex justify-content-end mx-5">
                      <button type="submit" class='btn btn-primary edit btn-sm'><i class='ri-printer-fill'></i></button>
                      
                      <a class='btn btn-primary edit btn-sm mx-2' data-bs-toggle='modal' data-bs-target='#modalPhone'>Add Prescription</a>
                </div>
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
                                    
                                   echo "<a class='btn btn-sm btn-primary test' data-bs-toggle='modal' data-bs-target='#modal'   data-trid = '".$report['id']."' data-id = '".$report['t_id']."'>View</a></td>
                                    ";
                                    echo "</td><td >";
                                    if($report['status']){
                                    echo "<input type='checkbox'  name='reports[]' value=".$report['id']." class='form-check-input p-2 shadow' /> ";
                                }
                                    echo "</td></tr>";
                                }
                                ?>
                                <tr>
                                <input type='hidden' id = "trid"  >
                                </tr>
                            </tbody>
                        </table>
                        </form>
                </div>
                


                  </div>
                </div>
              </div>
            </div>
  
          </div>




                
          <div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Previous Records</h5>
      </div>
      <div class="modal-body">
      <div id="report"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div>
</div>

          </div>

<div class="modal fade" id="modalPhone" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Prescription</h5>
      </div>

      <div class="modal-body">

      <div id="editor">
</div>
      
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="addpres">Submit</button>
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
<script src="../assets/quill.js"></script>

<script>
  var id = <?php echo json_encode($id); ?>;
  const quill = new Quill('#editor', {
    theme: 'snow'
  });

  $('#addpres').on('click', function() {
        var content = quill.root.innerHTML;

        $.ajax({
            url: 'savepres.php',
            type: 'POST',
            data: { content: content, id:id},
            success: function(response) {
                alert('Content Saved: ' + response);
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    });

    values = [];
  
    $(document).ready(function(){
        $(document).on('click', '.test', function() { 
                id = $(this).data('id');
                trid = $(this).data('trid');
                element = this;
                $('#print').attr('href',`../report/report.php?id=${trid}`)
                rep = $("#trid").val(trid) ;
                $.ajax({
                    url : 'selectreport.php',
                    type : 'POST',
                    data : {id : trid},
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










