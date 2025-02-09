
<?php
include "../header.php";
session_start();
if($_SESSION['user']['status']==true){

?>

<!DOCTYPE html>
<html lang="en">

<?php
include('../header.php');
include "../db.php";
?>

  <body>

    <div class="page-wrapper">
    <div class="app-header d-flex align-items-center">

    <?php
include('../topbar.php');
?>
  
      <div class="main-container">

<?php
include('../navbar.php');
$user_id = $_SESSION['user']['id'];
$stmt = $dbpdo->prepare("SELECT * FROM company WHERE `user_id`='$user_id' ");
$stmt->execute();
$comp = $stmt->fetch(PDO::FETCH_ASSOC);
?>
 
        <div class="app-container">

          <div class="app-hero-header d-flex align-items-center">

            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <i class="ri-home-8-line lh-1 pe-3 me-3 border-end"></i>
                <a href="index.html">Home</a>
              </li>
              <li class="breadcrumb-item text-primary" aria-current="page">
                Setting
              </li>
              <li class="breadcrumb-item text-primary" aria-current="page">
                Pending Reports
              </li>
            </ol>

          </div>
  
          <div class="app-body">

  <!-- Row starts -->
  <div class="row gx-3">
              <div class="col-xl-12">
                <div class="card">
                  <div class="card-body">

                    <!-- Custom tabs starts -->
                    <div class="custom-tabs-container">

                      <!-- Nav tabs starts -->
                      <ul class="nav nav-tabs" id="customTab2" role="tablist">
                        <li class="nav-item" role="presentation">
                          <a class="nav-link active" id="tab-oneA" data-bs-toggle="tab" href="#oneA" role="tab"
                            aria-controls="oneA" aria-selected="true"><i class="ri-profile-line"></i>Laboratory Information</a>
                        </li>
                        
                      </ul>
                      <!-- Nav tabs ends -->

                      <!-- Tab content starts -->
                      <div class="tab-content h-350">
                        <div class="tab-pane fade show active" id="oneA" role="tabpanel">

                          <!-- Row starts -->
                          <div class="row gx-3">
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label" for="name">Laboratory Name<span class="text-danger">*</span></label>
                                <div class="input-group">
                                  <span class="input-group-text">
                                    <i class="ri-account-circle-line"></i>
                                  </span>
                                  <input type="text" class="form-control" id="name" value='<?php echo $comp['name']?>'  name='name'  placeholder="Enter Lab Name">
                                  <input type='hidden' class='form-control' id='id' name='id' value='<?php echo $comp['id']?>'>
                                </div>
                              </div>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label" for="phone">Phone<span class="text-danger">*</span></label>
                                <div class="input-group">
                                  <span class="input-group-text">
                                    <i class="ri-phone-line"></i>
                                  </span>
                                  <input type="text" class="form-control" name='mobile' id="phone" value='<?php echo $comp['mobile']?>' placeholder="Phone Number">
                                </div>
                              </div>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label" for="website">Website<span class="text-danger">*</span></label>
                                <div class="input-group">
                                  <span class="input-group-text">
                                    <i class="ri-window-line"></i>
                                  </span>
                                  <input type="text" class="form-control" name='website' id="website" value='<?php echo $comp['website']?>' placeholder="Website Link">
                                </div>
                              </div>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label" for="dob">How Many year Old <span class="text-danger" >*</span></label>
                                <div class="input-group">
                                  <span class="input-group-text">
                                    <i class="ri-flower-line"></i>
                                  </span>
                                  <select class="form-select" id="dob" name='dob' value='<?php echo $comp['dob']?>'>
                                    <option value="-1">Select Age</option>
                                    <option value="0">Fresh</option>
                                    <option value="1-5">1 to 5</option>
                                    <option value="5-10">5 to 10</option>
                                    <option value="10-15">10 to 15</option>
                                    <option value="15-20">15 to 20</option>
                                    <option value="20-25">20 to 25</option>
                                    <option value="25-30">25 to 30</option>
                                    <option value="30-35">30 to 35</option>
                                    <option value="35-40">35 to 40</option>
                                    <option value="above-40">above 40</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <!-- <div class="col-xxl-3 col-lg-4 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label" for="selectGender1">Gender<span
                                    class="text-danger">*</span></label>
                                <div class="m-0">
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="selectGenderOptions"
                                      id="selectGender1" value="male">
                                    <label class="form-check-label" for="selectGender1">Male</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="selectGenderOptions"
                                      id="selectGender2" value="female">
                                    <label class="form-check-label" for="selectGender2">Female</label>
                                  </div>
                                </div>
                              </div>
                            </div> -->
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label" for="reg_no">Lab Registration #<span class="text-danger">*</span></label>
                                <div class="input-group">
                                  <span class="input-group-text">
                                    <i class="ri-secure-payment-line"></i>
                                  </span>
                                  <input type="text" class="form-control" id="reg_no" name='reg_no' value='<?php echo $comp['reg_no']?>' placeholder="Registration ID">
                                </div>
                              </div>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label"  for="owner_name">Owner Name<span class="text-danger">*</span></label>
                                <div class="input-group">
                                  <span class="input-group-text">
                                    <i class="ri-secure-payment-line"></i>
                                  </span>
                                  <input type="text" class="form-control" value='<?php echo $comp['owner_name']?>' id="ownername" name='owner_name' placeholder="Owner Nmae">
                                </div>
                              </div>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label" for="a5">Email ID <span class="text-danger">*</span></label>
                                <div class="input-group">
                                  <span class="input-group-text">
                                    <i class="ri-mail-open-line"></i>
                                  </span>
                                  <input type="email" class="form-control" id="email" value='<?php echo $comp['email']?>' placeholder="Enter Email ID">
                                </div>
                              </div>
                            </div>


        
      
                
                            <div class="col-xxl-6 col-lg-4 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label" for="a11">Address</label>
                                <div class="input-group">
                                  <span class="input-group-text">
                                    <i class="ri-projector-line"></i>
                                  </span> 
                                  <textarea name="address" class="form-control" id=""><?php echo $comp['address']?> </textarea>
                                </div>
                              </div>
                            </div>
                            <hr>

                            <div class="row">
                                    <div class="col-md-6 mt-5">
                                        <form id="submitupload" enctype="multipart/form-data">
                                        <input type="file" name='file' id='file' class="form-control"><br>
                                        <button class="btn btn-dark btn-sm mt-2" type="submit" name="submit">Upload image</button><br><br>

                                        <span class="text-danger"><ul>
                                            <li>Formate: PNG Only</li>
                                            <li>Dimensions: 250 x 250 px</li>
                                            <li>Size: 100 KB to 2 MB </li>
                                        </ul></span>
                                        </form>
                                    </div>
                                    <div class="col-md-4">
                                        Your Logo
<div class="logo" style =" border: 2px solid black;height:250px; width:250px">
<img src="../images/<?php echo $comp['reg_no']?>.png" alt="" class="w-100">
</div>
                                    </div>
                                </div>
<hr class="mt-3">
                            <div class="row">
                                    <div class="col-md-6 mt-5 mx-auto">
                                        <form id="headerupload" enctype="multipart/form-data">
                                        <input type="file" name='header' id='header' class="form-control"><br>
                                        <button class="btn btn-dark btn-sm mt-2" type="submit" name="submit">Upload image</button><br><br>

                                        <span class="text-danger"><ul>
                                            <li>Formate: JPG Only</li>
                                            <li>Dimensions: 4893 x 880 px</li>
                                            <li>Size: 100 KB to 2 MB </li>
                                        </ul></span>
                                        </form>
                                    </div>
                                    <div class="col-md-12">
                                        Your Header
<div class="logo" style =" border: 2px solid black;height:200px; width:100%   ">
<img src="../images/<?php  echo $comp['reg_no']; ?>header.jpg" alt=""  style ="height:200px; width:100%" class="w-100">
</div>
                                    </div>
                                </div>

                                <a href='#' data-bs-toggle="modal" data-bs-target="#modal" class="mt-3">Change Password</a>

                          </div>
                          <!-- Row ends -->
  
          </div>


        </div>
 
      </div>
 

    </div>
   
		<?php
include('../footer.php');
		?>
  </body>






  <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reset password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form >
       <div class="mb-3">
        <label>Old Passowrd</label>
        <input type="text" class="form-control" id="oldpassword">
       </div>
 
       <div class="mb-3">
        <label>New Passowrd</label>
        <input type="text" class="form-control" id="newpassword">
       </div>
 
       <div class="mb-3">
        <label>Confirm Passowrd</label>
        <input type="text" class="form-control" id="confirmpassword">
       </div>

    </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save">Update</button>
      </div>
      
    </div>
  </div>
</div>
</div>
</html>

<script>
    $(document).ready(function(){
        $('#save').click(function(){
            id = $('#id').val();
            name = $('#name').val();
            mobile = $('#mobile').val();
            website = $('#website').val();
            address = $('#address').val();
            $.ajax({
                url: 'updatecompany.php',
                type: 'POST',
                data: {id:id,name:name,mobile:mobile,website:website,address:address},
                success:function(data){
                    console.log(data);
                    if ( data == 1){
                        $('#alert').html(`<div class="alert alert-success d-flex align-items-center" role="alert">
  <svg   class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    Record Successfully Updated
  </div>
</div>
`);
setTimeout(() => { $('#alert').html(``);
}, 3000);
                    }
                }
            })
        });
         function showcompany(){
            $.ajax({
                url : 'showcompany.php',
                type: 'POST',
                success:function(data){
                    $('#form').html(data);
                }
            })
         }
         showcompany();

        $('#submitupload').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                url:'fileupload.php',
                type:'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success:function(data){
                    console.log(data);
                }
            })
        })

        $('#headerupload').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                url:'headerupload.php',
                type:'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success:function(data){
                    console.log(data);
                }
            })
        })
    })
</script>



<?php
}else{
  header("Location: http://localhost/labreport/labs/");
}
?>












