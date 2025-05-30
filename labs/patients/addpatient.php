

<?php
include "../header.php";
include "../db.php";
session_start();
if($_SESSION['user']['status']==true){
  $stmt = $dbpdo->prepare("SELECT * FROM provinces");
  $stmt->execute();
  $provinces = $stmt->fetchAll();
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
                Patients
              </li>
              <li class="breadcrumb-item text-primary" aria-current="page">
                Add Patients
              </li>
            </ol>

          </div>
  
          <div class="app-body card m-2">

            <div class="row gx-3 ">
              <div class="col-sm-12">
              <form id="form">
                        <div class="row">

                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                        <div><label for="Provinces">Patient Name</label><span class="text-danger">*</span></div>
                          <input type="text" class="form-control" id="name" placeholder="Enter Full Name">
                          <input type="hidden" id="id">
                        </div>
                        </div>

                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                        <div><label for="Provinces">Mobile</label><span class="text-danger">*</span></div>
                          <input type="text" class="form-control" id="phone" placeholder="Phone Number">
                        </div>
                        </div>

                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                        <div><label for="Provinces">Age</label><span class="text-danger">*</span></div>
                          <input type="number" class="form-control" id="age" placeholder="Age">
                        </div>
                        </div>

                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                        <div><label for="Provinces">CNIC</label><span class="text-danger">*</span></div>
                          <input type="number" class="form-control" id="cnic" placeholder="CNIC #">
                        </div>
                        </div>

                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                        <div><label for="Provinces">Sex</label><span class="text-danger">*</span></div>
                          <div class="m-0">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="gender"
                                value="male">
                              <label class="form-check-label" >Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="gender"
                                value="female">
                              <label class="form-check-label">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="gender"
                                value="other">
                              <label class="form-check-label">Other</label>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-3 d-flex flex-column">
											<div><label for="Provinces">Province</label><span class="text-danger">*</span></div>
												<select name="province" id="province" class="form-control" >
													<option value="">Select Province</option>
													<?php
foreach($provinces as $province){
	echo "<option value={$province['id']}>{$province['name']}</option>";
}
													?>
												</select>
										</div>

                    <div class="col-lg-3 d-flex flex-column">
												<div><label for="district">District</label><span class="text-danger">*</span></div>
												<div id="districts" class="w-100">
												<select name="district"  class="form-control" >
													<option value="">Select District </option>
												</select>
												</div>
										</div>
       
                      <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <div class="mb-3">
                        <div><label for="Provinces">Referred By</label><span class="text-danger">*</span></div>
                          <select class="form-select" name="doctor" id="doctor" >
                            
                          </select>
                        </div>
                      </div>

        

       
    
    <span class="text-danger" id="error"></span>

 </div>
      </div>
    </form>


    <div class="col-md-4 mt-2">
                    <div class="card">
                        
                        <div class="card-body">
                        <div class="mb-3">
                          <div class="m-0">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="test_type"
                                value="custome">
                              <label class="form-check-label" >Custom</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="test_type"
                                value="general">
                              <label class="form-check-label">General</label>

                          </div>
                        </div>
                                <div class="mb-3">
                                    Select Test 
                                    <input list="test" class="form-control" id="option">
                                      <datalist id="test">
                                        <option value="Please Select Type">

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

              
              </div>
              <div class="col-md-8 mt-2" style = "z-index:999;">
                    <div class="card">
<div id="alltest"></div></div>

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
  header("Location: http://localhost/labreport/labs/");
}
?>


<script>
  test_type = "";



function finddoctor(id){
      console.log("this.target.value");
    }

$('#province').change(function(){
			id = this.value;
      console.log(id);
			$.ajax({
				url:'../../fetchdistrict.php',
				type:'post',
				data:{id:id},
				success:function(data){
					$('#districts').html(data);
				}
			})
		})

    function finddoctor(id){
      dis = id.value;
      $.ajax({
				url:'fetchdoctor.php',
				type:'post',
				data:{id:dis},
				success:function(data){
          console.log(data);
					$('#doctor').html(data);

				}
			})
    }






  
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
                        <button class='btn btn-danger  btn-sm' onClick="delrep(${records.indexOf(record)} )" id = '${records.indexOf(record)}'><i class='ri-delete-bin-line'></i></button>
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
      data:{id:id,type:test_type},
      success:function(data){
        console.log(data);
        records.push(JSON.parse(data));
        showreport();
        
      }
    })
  }
});






    
            //  show Test Name
            function showtest(){
              const radios = document.querySelectorAll('input[name="test_type"]');

radios.forEach(radio => {
    radio.addEventListener('change', (event) => {
      test_type = event.target.value;
      if(event.target.value == "custome"){
        $.ajax({
                url:'showcustome.php',
                type:'POST',
                success:function(data){
                  $('#test').html(data);
                }
              })
      }else{
        $.ajax({
                url:'showtest.php',
                type:'POST',
                success:function(data){
                  $('#test').html(data);
                }
              })
      }
    });
  });
  
            }
            showtest()

            // insert patient 
            $('#save').on('click',e=>{
                e.preventDefault();
                id = $('#id').val();
                name = $('#name').val();
                phone = $('#phone').val();
                age = $('#age').val();
                sex = $('input[name="gender"]:checked').val();
                doctor = $('#doctor').val();
                charges = $('#total').text();
                cnic = $('#cnic').val();
                reports = records;


                if(name == "" ||age == "" ||doctor == ""|| cnic == ""){
                    $('#error').html('All Field Must be Required Without Phone');
                }else{
                $.ajax({
                    url : "insertpatient.php",
                    type : "POST",
                    data : {id: id,name: name,phone: phone,age: age,sex: sex,doctor:doctor,reports:reports,charges:charges,cnic:cnic},
                    success : function(data){
                      console.log(data);
                      if(data>0){
                        a = document.createElement('a');
                        a.href=`receipt.php?id=${data}`;
                        a.click();
                      }else{
                        alert('Error Found to Add the Patient')
                      }

                    }
                });
              }
            }); 

        })

        function delrep(e){
  records.splice( records.e , 1)
  showreport();
}

</script>