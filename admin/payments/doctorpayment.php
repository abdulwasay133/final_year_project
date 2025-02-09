<?php
include "../header.php";
session_start();
if($_SESSION['user']){

?>
<body class="p-0 m-0">


    <div class="container">
 

        <div class="row mt-5">
        
        <div class="col-md-10 mx-auto">
            <div class="card shadow">
                <div class="card-header bg-dark text-light">
                <h3><b>Doctor Payments</b></h3>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between  mb-3">
                <!-- <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modal" >+ Add Record</button> -->

            </div>
            
                <div id="table">
                    <div class="d-flex justify-content-center">
                        <img src="asset/loader1.gif" alt="" class="my-5">
                        </div>
                </div>
            </div>
                </div>
            </div>


<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark text-light">
        <h5 class="modal-title" id="exampleModalLabel">Enter New Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form id="form">
       <div class="mb-3">
        <label>Cagegory Name</label>
        <input type="text" class="form-control" id="name">
        <input type="hidden" id="id">
       </div>
<div class="row">
    

   

  
    <span class="text-danger" id="error"></span>

</div>  
      </div>
    </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save">Save</button>
      </div>
      
    </div>
  </div>
</div>

<?php
 }else{
  header("Location: http://localhost/labreport/login.php");
}
?>

        </div>
    </div>
</body>
</html>

<script>
    $(document).ready(function(){

        // Show
        function loadTable(){
            $.ajax({
                url : "showdoctorpayment.php",
                type : "POST",
                success : function(data){
                    $('#table').html(data);
                    new DataTable('#example', {
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
                name = $('#name').val();
                id = $('#id').val();
                if(name == ""){
                    $('#error').html('Test Name must bhe required');
                }
                
                $.ajax({
                    url : "insertcategory.php",
                    type : "POST",
                    data : {id: id,name: name},
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
            $(document).on('click', '.delete', function() { 
                if(confirm('Do you Really want to delete this Record')){
                id = $(this).data('id');
                element = this;
                $.ajax({
                    url : 'deletecategory.php',
                    type : 'POST',
                    data : {id : id},
                    success : function (data){
                        if(data == 1)
                            $(element).closest('tr').fadeOut();
                    }
                })
            }
             });

            //  update 
             $(document).on('click','.edit',function(){
                $("#modal").modal("show");
                id = $(this).data('id');

                $.ajax({
                    url : "editcategory.php",
                    type : "POST",
                    data : {id : id},
                    success: function(data){
                        $('#form').html(data); 
                       
                    }
                })
             })


        });
        

</script>