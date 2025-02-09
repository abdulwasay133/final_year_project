<?php
include "../header.php";
session_start();
if($_SESSION['user']){
?>
<body class="p-0 m-0">


    <div class="container">
 
    <div id='alert'></div>
        <div class="row mt-5">
        <div class="col-md-12 mx-auto">
            <div class="card shadow">
            <div class="card-header bg-dark text-light">
                <h3><b>All Patient Management</b></h3>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between  mb-3">

            </div>
            
                <div id="table">
                    <div class="d-flex justify-content-center">
                        <img src="../asset/loader1.gif" alt="" class="my-5">
                        </div>
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
                url : "showpatient.php",
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