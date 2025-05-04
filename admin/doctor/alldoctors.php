<?php
include "../header.php";
session_start();
if($_SESSION['user']){

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
                Doctors List
              </li>
            </ol>




          </div>

          <div class="app-body">

            <div class="row gx-3">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Doctors List</h5>
                  </div>
                  <div class="card-body">

                              
                <div id="table" class="table-responsive">
                    <div class="d-flex justify-content-center">
                        <img src="../asset/loader1.gif" alt="" class="my-5">
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


<script>
    $(document).ready(function(){

        // Show
        function loadTable(){
            $.ajax({
                url : "showdoctor.php",
                type : "POST",
                success :  (data)=>{
                    $('#table').html(data);
                    new DataTable('#myTable', {
                      buttons: ['print', 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5'],
        initComplete: function () {
            var btns = $('.dt-button');
            btns.addClass('btn btn-dark btn-sm');
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



            //  Approve 
             $(document).on('click','.edit',function(){
                $("#modal").modal("show");
                id = $(this).data('id');

                $.ajax({
                    url : "approverequest.php",
                    type : "POST",
                    data : {id : id},
                    success: function(data){
                        console.log(data); 
                        loadTable();
                    }
                })
             })

            //  Reject 
             $(document).on('click','.delete',function(){
                $("#modal").modal("show");
                id = $(this).data('id');

                $.ajax({
                    url : "rejectrequest.php",
                    type : "POST",
                    data : {id : id},
                    success: function(data){
                        console.log(data); 
                        loadTable();
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