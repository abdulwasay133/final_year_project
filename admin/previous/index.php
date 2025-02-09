<?php
include "../db.php";
include "../header.php";
?>
<body class="p-0 m-0">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
       <div class="card shadow">
        <div class="card-header bg-dark text-light"><h4>All Pending Patients</h4></div>
        <div class="card-body">
    <div id="data"></div>
    
</div>
       </div>

        </div>
        </div>
    </div>
</body>
<script>
$(document).ready(function(){
function showtest(){
    $.ajax({
        url:"showtest.php",
        type: "POST",
        success:function(data){
            $('#data').html(data);
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
showtest()
})
    

</script>