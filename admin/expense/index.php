<?php
include "../header.php";
session_start();
if($_SESSION['user']){

?>
<body class="p-0 m-0">


    <div class="container">
        
    <div class="svg"> 
    <svg  style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>
</div> 
    <div id='alert'></div>
        <div class="row mt-3">
        
        <div class="col-md-10 mx-auto">
            <div class="card shadow">
                <div class="card-header bg-dark text-light">
                <h3><b>Add Expense</b></h3>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between  mb-3">
                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modal" >+ Add Record</button>

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
        <label>Amount</label>
        <input type="text" class="form-control" id="amount">
        <input type="hidden" id="id">
       </div>
       <div class="mb-3">
        <label>Date</label>
        <input type="date" class="form-control" id="date">
       </div>
       <div class="mb-3">
        <label>Description</label>
        <textarea name="description" id="description" class="form-control"></textarea>
       </div>
<div class="row">
    <span class="text-danger" id="error"></span>
</div>  
    </form>
  </div>
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
                url : "showexpense.php",
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
                date = $('#date').val();
                id = $('#id').val();
                amount = $('#amount').val();
                description = $('#description').val();
                if(name == ""){
                    $('#error').html('Test Name must bhe required');
                }
                
                $.ajax({
                    url : "insertexpense.php",
                    type : "POST",
                    data : {id: id,date: date,amount:amount,description:description},
                    success : function(data){
                      console.log(data);
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
                    url : 'deleteexpense.php',
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
                    url : "editexpense.php",
                    type : "POST",
                    data : {id : id},
                    success: function(data){
                        $('#form').html(data); 
                       
                    }
                })
             })


        });
        

</script>