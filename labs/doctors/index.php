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
                    <a href="add-doctors.html" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#modal" >Add Doctor</a>
                  </div>
                  <div class="card-body">

                              
                <div id="table" class="table-responsive">
                    <div class="d-flex justify-content-center">
                        <img src="../asset/loader1.gif" alt="" class="my-5">
                        </div>
                </div>


                
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter Doctor</h5>
      </div>
      <div class="modal-body">
<form id="form">
       <div class="mb-3">
        <label>Doctor Name</label>
        <input type="text" class="form-control" id="name">
        <input type="hidden" id="id">
       </div>

       <div class="mb-3">
        <label>Phone</label>
        <input type="text" class="form-control" id="phone">
       </div>

       <div class="mb-3">
        <label>Address</label>
        <input type="text" class="form-control" id="address">
       </div>

    
    
    <span class="text-danger" id="error"></span>

 
      </div>
    </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save">Save</button>
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
                success : function(data){
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

            // insert 
            $('#save').on('click',e=>{
                e.preventDefault();
                id = $('#id').val();
                name = $('#name').val();
                phone = $('#phone').val();
                address = $('#address').val();
                if(name == ""){
                    $('#error').html('Test Name must bhe required');
                }
                
                $.ajax({
                    url : "insertdoctor.php",
                    type : "POST",
                    data : {id: id,name: name,phone: phone,address: address},
                    success : function(data){
                        if ( data == 1)
                    { loadTable();
                            $('#form').trigger('reset');
                            $("#modal").modal("hide");
                            $('#alert').html(`<div class="alert alert-success d-flex align-items-center" role="alert">
  <svg   class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    Record Successfully Added
  </div>
</div>
`);
setTimeout(() => { $('#alert').html(``);
    
}, 3000);
                    }
                    }
                })
            });
            
            // delete 
            $(document).on('click', '.show', function() { 
                if(confirm('Do you Really want to delete this Record')){
                id = $(this).data('id');
                element = this;
                $.ajax({
                    url : 'deletedoctor.php',
                    type : 'POST',
                    data : {id : id},
                    success : function (data){
                        if(data == 1)
                            $(element).closest('tr').fadeOut();
                            $('#alert').html(`<div class="alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>
    Record has been deleted 
  </div>
</div>
`);
setTimeout(() => { $('#alert').html(``);
    
}, 3000);
                    }
                })
            }
             });

            //  update 
             $(document).on('click','.edit',function(){
                $("#modal").modal("show");
                id = $(this).data('id');

                $.ajax({
                    url : "editdoctor.php",
                    type : "POST",
                    data : {id : id},
                    success: function(data){
                        $('#form').html(data); 
                       
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