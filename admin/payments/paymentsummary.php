<?php
include "../db.php";
include "../header.php";
?>
<body class="p-0 m-0">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header bg-dark text-light"><h4>Patient Summary</h4></div>
            
            <div class="card-body">
                <div class="row">
                <div class="col-md-3">
                    Starting Date
                    <input type="date" id="start" class="form-control">
                </div>
                <div class="col-md-3">
                    Ending Date
                    <input type="date" id="end" class="form-control">
                </div>
                <div class="col-md-3">
                <button class="btn btn-dark mt-4" id="search">Search</button>
                </div>

                </div>
                <table id='myTable' class="table table-bordered table-striped mt-2">
                    <thead>
                        <th>#</th>
                        <th>Patient</th>
                        <th>Age</th>
                        <th>Contact</th>
                        <th>Sex</th>
                        <th>Doctor</th>
                        <th>Date</th>
                        <th>Charges</th>
                    </thead>
                    <tbody id="table">
                        
                    </tbody>
                </table>
            </div>
            </div>
            </div>
        </div>
    </div>
</body>
<script>

    $(document).ready(function(){


    $("#search").on('click',function(){
        start = $("#start").val();
        end = $("#end").val();
        $.ajax({
            url:"searchsummary.php",
            type:'POST',
            data:{start:start,end:end},
            success:function(data){
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
        })
    })
            
})
</script>