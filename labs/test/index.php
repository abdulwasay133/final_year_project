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
                Test List
              </li>
            </ol>




          </div>

          <div class="app-body">

            <div class="row gx-3">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Test List</h5>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal" >+ Add Record</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Enter New Test</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form id="form">
       <div class="mb-3">
        <label>Test Name</label>
        <input type="text" class="form-control" id="name">
        <input type="hidden" id="id">
       </div>
<div class="row">
    
    <div class="col-md-6">
    <div class="mb-3">
    Select Category
        <select name="category" id="category" class="form-control">
          
        </select>
       </div>
    </div>
    <div class="col-md-6">
    <div class="mb-3">
        <label>Short Name</label>
        <input type="text" class="form-control" id="short">
       </div>
    </div>

    <div class="col-md-6">
    <div class="mb-3">
        <label>Group</label>
        <input type="text" class="form-control" id="group">
       </div>
    </div>
    <div class="col-md-6">
    <div class="mb-3">
        <label>Charges</label>
        <input type="number" class="form-control" id="charges">
       </div>
    </div>
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
      
      1
      // DataTables.Buttons.defaults.bom.button.className = 'btn btn-dark';
        // Show
        function loadTable(){
            $.ajax({
                url : "showtest.php",
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
                category = $('#category').val();
                short = $('#short').val();
                group = $('#group').val();
                id = $('#id').val();
                charges = $('#charges').val();
                if(name == ""){
                    $('#error').html('Test Name must bhe required');
                }
                
                $.ajax({
                    url : "inserttest.php",
                    type : "POST",
                    data : {id: id,name: name,short: short,group: group,category: category,charges: charges},
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
                    url : 'deletetest.php',
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
                    url : "edittest.php",
                    type : "POST",
                    data : {id : id},
                    success: function(data){
                        $('#form').html(data); 
                        showcategory();
                    }
                })
             })

                         //  show doctor
            function showcategory(){
              $.ajax({
                url:'showcategory.php',
                type:'POST',
                success:function(data){
                  $('#category').html(data);
                }
              })
            }
            showcategory()
           

        });
        

</script>
<?php
}else{
  header("Location: http://localhost/labreport/labs/");
}
?>






