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
                Add Test
              </li>
            </ol>




          </div>

          <div class="app-body">

            <div class="row gx-3">
              <div class="col-sm-12">
              <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                <div class="card">
                    <div class="card-header"><h4>Add Test</h4></div>
                    <div class="card-body">
                    <form id="form">
                        <div class="row">

       <div class="col-md-3">
        <label>Test Name</label>
        <input type="text" class="form-control" id="t_name">
        <input type="hidden" id="id">
       </div>

       <div class="col-md-3">
        <label>Category</label>
        <select name="t_category" id="t_category" class="form-control">
          
          </select>
        
       </div>

       <div class="col-md-3">
       <label>Group</label>
       <input type="text" class="form-control" id="t_group">
       </div>

       <div class="col-md-3">
        <div class="row">
        <div class="col-md-6">
        <div class="mb-3">
        <label>Short Name</label>
        <input type="text" class="form-control" id="t_short">
       </div>
        </div>

        <div class="col-md-6">
        <div class="mb-3">
        Charges
        <input type="text" class="form-control" id="t_charges">
       </div>
        </div>
        </div>
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
                                    Sub-Name
                                    <input type="text" class="form-control" id="sub_name">
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                <div class="mb-3">
                                    Low
                                    <input type="text" class="form-control" id="min">
                                </div>
                                </div>
                                <div class="col-md-4">
                                <div class="mb-3">
                                    High
                                    <input type="text" class="form-control" id="max">
                                </div>
                                </div>
                                <div class="col-md-4">
                                <div class="mb-3">
                                    Unit
                                    <input type="text" class="form-control" id="unit">
                                </div>
                                </div>
                                </div>
                                <div class="mb-3">
                                   Normal Ranges
                                    <textarea name="refrange" id="refrange" class="form-control"></textarea>
                                </div>

                      <button class='btn btn-primary' id='save'>Add Now</button>
                           
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mt-2" style = "z-index:999;">
                    <div class="card">
<div id="alltest"></div>
<button class="btn btn-primary" id="insert">Inser Test</button>
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




<?php
 }else{
  header("Location: http://localhost/labreport/login.php");
}
?>


<script>


 
 function addtest(){
  total = 0;
    output = `<div  class='bordered ' style="border:1px doted black">
            <table class="table text-center">
                <thead>
                    <th>Sub Name</th>
                    <th>Min</th>
                    <th>Max</th>
                    <th>Refrange</th>
                    <th>Action</th>

                </thead>
                <tbody>`;
    for(record of records){
        output += `<tr>
        
                        <td>${record.sub_name}</td>
                        <td>${record.min}</td>
                        <td>${record.max}</td>
                        <td>${record.unit}</td>
                        <td>${record.refrange}</td>
                        <td>
                        <button class='bi bi-trash btn btn-danger  btn-sm' onClick="delrep(${records.indexOf(record)} )" id = '${records.indexOf(record)}'></button>
                        </td>
                    </tr>`; }
    output +=`</tbody></table></div>`;

    $('#alltest').html(output);
    document.querySelector('#sub_name').value = "";
    document.querySelector('#min').value = "";
    document.querySelector('#max').value = "";
    document.querySelector('#unit').value = "";
    document.querySelector('#refrange').value = "";
}

    $(document).ready(function(){
        $('#insert').on('click',e=>{
                e.preventDefault();
                t_name = $('#t_name').val();
                t_category = $('#t_category').val();
                t_group = $('#t_group').val();
                t_short = $('#t_short').val();
                t_charges = $('#t_charges').val();
                reports = records;
                console.log('ok');
                
                if(t_name == "" ||t_category == "" ||t_group == "" ||t_short == ""||t_charges == ""|| reports ==""){
                    $('#error').html('All Fields and Test Detail Must be Required ');
                }
                
                $.ajax({
                    url : "inserttest.php",
                    type : "POST",
                    data : {t_name: t_name,t_category: t_category,t_group: t_group,t_short: t_short,t_charges: t_charges,reports:reports},
                    success : function(data){
                        location.reload();
                        console.log(data);
//                       if(data > 0 ){
// console.log(data);
//                       }else{
//                         alert('Error Found to Add the Patient')
//                       }

                    }
                });
            }); 

    records = [];
$('#save').on('click',function(e){
    e.preventDefault()
    sub_name = $('#sub_name').val();
    min = $('#min').val();
    max = $('#max').val();
    unit = $('#unit').val();
    refrange = $('#refrange').val();
    data = {sub_name:sub_name,min:min,max:max,unit:unit,refrange:refrange};

    records.push(data);
    console.log(data);
    addtest();


});





            //  show Category
            function showcategory(){
              $.ajax({
                url:'showcategory.php',
                type:'POST',
                success:function(data){
                  $('#t_category').html(data);
                }
              })
            }
            showcategory()
    
            //  show Test Names
            // function showtest(){
            //   $.ajax({
            //     // url:'showtest.php',
            //     type:'POST',
            //     success:function(data){
            //       $('#test').html(data);
            //     }
            //   })
            // }
            // showtest()

            // insert patient 


        })

        function delrep(e){
  records.splice( records.e , 1)
  showreport();
}

</script>