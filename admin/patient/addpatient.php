<?php
include "../db.php";
include "../header.php";
session_start();
if($_SESSION['user']){
?>
<body class="p-0 m-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark text-light"><h4>Add Patient</h4></div>
                    <div class="card-body">
                    <form id="form">
                        <div class="row">

       <div class="col-md-3">
        <label>Patient Name</label>
        <input type="text" class="form-control" id="name">
        <input type="hidden" id="id">
       </div>

       <div class="col-md-3">
        <label>Phone</label>
        <input type="text" class="form-control" id="phone">
       </div>

       <div class="col-md-3">
        <div class="row">
        <div class="col-md-6">
        <div class="mb-3">
        <label>Age</label>
        <input type="text" class="form-control" id="age">
       </div>
        </div>

        <div class="col-md-6">
        <div class="mb-3">
        <label>Sex</label>
        <input type="text" class="form-control" id="sex">
       </div>
        </div>
        </div>
       </div>

       <div class="col-md-3">
        Select Referred Doctor
        <select name="doctor" id="doctor" class="form-control">
          
        </select>
       </div>

       
    
    <span class="text-danger" id="error"></span>

 </div>
      </div>
    </form>
                    </div>
                </div>

                <div class="col-md-4 mt-2">
                    <div class="card">
                        
                        <div class="card-body">

                                <div class="mb-3">
                                    Select Test 
                                    <input list="test" class="form-control" id="option">
                                      <datalist id="test">
                                        <option value="Internet Explorer">
                                        <option value="Firefox">
                                        <option value="Chrome">
                                        <option value="Opera">
                                        <option value="Safari">
                                      </datalist> 

                                </div>
                                <div class="mb-3">
                        Discount
                        <input type="number" class="form-control" id="discount">
                      </div>
                      <div class="mb-3 fs-3"  style='height:3rem'>
                            Total: <b><span id="total">0</span></b>
                      </div>
                      <button class='btn btn-primary' id='save'>Add Now</button>
                           
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mt-2" style = "z-index:999;">
                    <div class="card">
<div id="alltest"></div></div>

                </div>

            </div>
        </div>
    </div>
</body>
<?php
 }else{
  header("Location: http://localhost/labreport/login.php");
}
?>
<script>
  
function showreport(){
  total = 0;
    output = `<div  class='bordered ' style="border:1px doted black">
            <table class="table text-center">
                <thead>
                    <th>Test ID</th>
                    <th>Test Name</th>
                    <th>Charges</th>
                    <th>Action</th>

                </thead>
                <tbody>`;
    for(record of records){
      total +=record.t_charges;
        output += `<tr>
        
                        <td>${record.t_id}</td>
                        <td>${record.t_name}</td>
                        <td>${record.t_charges}</td>
                        <td>
                        <button class='bi bi-trash btn btn-danger  btn-sm' onClick="delrep(${records.indexOf(record)} )" id = '${records.indexOf(record)}'></button>
                        </td>
                    </tr>`; }
    output +=`</tbody></table></div>`;
    document.querySelector('#total').innerHTML = total;

    console.log(total);
    $('#alltest').html(output);
}
function discount(){
discount = document.querySelector("#discount");
discount.addEventListener('blur',e=>{

total = document.querySelector("#total");
total.innerHTML = Number(total.textContent) -  discount.value;
});
}
discount();





    $(document).ready(function(){
    records = [];
$('#option').on('keydown',(e)=>{
  if(e.key =="Enter"){
    e.preventDefault()
    id = $('#option').val();
    $.ajax({
      url:"addpatienttest.php",
      type:'POST',
      data:{id:id},
      success:function(data){
        records.push(JSON.parse(data));
        showreport();
        
      }
    })
  }
});





            //  show doctor
            function showdoctor(){
              $.ajax({
                url:'showdoctor.php',
                type:'POST',
                success:function(data){
                  $('#doctor').html(data);
                }
              })
            }
            showdoctor()
    
            //  show Test Names
            function showtest(){
              $.ajax({
                url:'showtest.php',
                type:'POST',
                success:function(data){
                  $('#test').html(data);
                }
              })
            }
            showtest()

            // insert patient 
            $('#save').on('click',e=>{
                e.preventDefault();
                id = $('#id').val();
                name = $('#name').val();
                phone = $('#phone').val();
                age = $('#age').val();
                sex = $('#sex').val();
                doctor = $('#doctor').val();
                charges = $('#total').text();
                reports = records;
                
                if(name == "" ||age == "" ||sex == "" ||doctor == ""){
                    $('#error').html('All Field Must be Required Without Phone');
                }
                
                $.ajax({
                    url : "insertpatient.php",
                    type : "POST",
                    data : {id: id,name: name,phone: phone,age: age,sex: sex,doctor:doctor,reports:reports,charges:charges},
                    success : function(data){
                      console.log(data);
                      if(data > 0 ){

                        a = document.createElement('a');
                        a.href=`receipt.php?id=${data}`;
                        a.click();
                      }else{
                        alert('Error Found to Add the Patient')
                      }

                    }
                });
            }); 

        })

        function delrep(e){
  records.splice( records.e , 1)
  showreport();
}

</script>