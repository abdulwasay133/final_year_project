


<?php
include "../header.php";
session_start();
if($_SESSION['user']['status']==true){

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
                Patients
              </li>
              <li class="breadcrumb-item text-primary" aria-current="page">
                Patients List
              </li>
            </ol>

          </div>
  
          <div class="app-body">

            <div class="row gx-3">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Patients List</h5>
                    <a href="/labreport/labs/patients/addpatient.php" class="btn btn-primary ms-auto">Add Patient</a>
                  </div>
                  <div class="card-body">

                              
                <div id="table" class="table-responsive">
                    <div class="d-flex justify-content-center">
                        <img src="../assets/loader1.gif" alt="loader" class="my-5">
                        </div>
                </div>


                  </div>
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
<style>
  div.dt-buttons {
    position: absolute;
    top: 0;
    left: 450;
}
</style>

<script>
    $(document).ready(function(){

        // Show
        function loadTable(){
            $.ajax({
                url : "showpatient.php",
                type : "POST",
                success : function(data){
                    $('#table').html(data);
                    new DataTable('#myTable', {
                      buttons: ['print', 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5'],
        initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn');
            btns.removeClass('dt-button');
        },
    layout: {
        bottomStart: 'buttons'
    }
});
                }
            });
        }
            loadTable();

            
            
            // delete 
            $(document).on('click', '.delete', function() { 
                if(confirm('Do you Really want to delete this Record')){
                pid = $(this).data('pid');
                console.log(pid);
                element = this;
                $.ajax({
                    url : 'deletepatient.php',
                    type : 'POST',
                    data : {pid : pid},
                    success : function (data){
                        console.log(data);
                        if(data == 1){
                            $(element).closest('tr').fadeOut();
                            $('#alert').html(`<div class="alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>
    Record has been deleted 
  </div>
</div>`);
setTimeout(() => { $('#alert').html(``); 
}, 3000);
                    }
                }
                })
            }
             });

            //  update 
             $(document).on('click','.edit',function(){
                $("#modal").modal("show");
                id = $(this).data('id');

                $.ajax({
                    url : "editpatient.php",
                    type : "POST",
                    data : {id : id},
                    success: function(data){
                        $('#form').html(data); 
                        showdoctor()
                       
                    }
                })
             })

          

        });
        

</script>

<?php
}else{
  header("Location: http://localhost/labreport/labs/");
}
?>

