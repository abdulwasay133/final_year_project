<?php
include "../db.php";
include "../header.php";
?>
<body class="p-0 m-0">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header bg-dark text-light"><h4>Doctor Payments</h4></div>
            
            <div class="card-body">
                <div class="row">
                <div class="col-md-2">
                    Starting Date
                    <input type="date" id="start" class="form-control">
                </div>
                <div class="col-md-2">
                    Ending Date
                    <input type="date" id="end" class="form-control">
                </div>
                <div class="col-md-2">
                    Select Doctor
                    <select name="doctor" id="doctor" class="form-control"></select>
                </div>
                <div class="col-md-2">
                <button class="btn btn-dark mt-4" id="search">Search</button>
                </div>
                <div class="col-md-2">
                <div class="text-center"  ><span >-: Payment :-</span><input id="pay" class="form-control" readonly> </div>
                </div>
                <div class="col-md-2">
               <button class="btn btn-dark btn-sm mt-4" id="docpay">Pay Now</button>
                </div>
                </div>
                <table id="myTable"class="table table-bordered table-striped mt-2">
                    <thead>
                        <th>#</th>
                        <th>Patient</th>
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


$("#docpay").on('click',function(){
        doctor = $("#doctor").val();
        pay = $('#pay').val();
        $.ajax({
            url:"insertdoctorpayment.php",
            type:'POST',
            data:{doctor:doctor,pay:pay},
            success:function(data){
                if(data == 1){
                    console.log('ok');
                }else{
                    console.log('Error');
                }
            }
        })
    })

    function calculate(){
        total = document.querySelector('#total').innerHTML;
        comm = document.querySelector('#comm').value;
        pay = total*(comm/100);
        document.querySelector('#pay').value = pay.toFixed(2);
}
    $(document).ready(function(){

    function doctors(){
        $.ajax({
            url:'doctors.php',
            type:'POST',
            success:function(data){
                $('#doctor').html(data);
            }
        });
    }
    doctors();
    $("#search").on('click',function(){
        doctor = $("#doctor").val();
        start = $("#start").val();
        end = $("#end").val();
        $.ajax({
            url:"searchdoctorpay.php",
            type:'POST',
            data:{doctor:doctor,start:start,end:end},
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