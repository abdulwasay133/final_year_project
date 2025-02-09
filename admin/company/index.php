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
        <div class="row mt-5">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header bg-dark text-light">
                        <h4>Company Information</h4>
                    </div>
                    <div class="card-body">
                        <div id="form">
                    <div class="mb-3">

                                <div class="col-md-12">
                                    Company Name
                                    <input type="text" class="form-control" id='name' name='name'>
                                </div>



                            <div class="row mt-3">
                                <div class="col-md-6">
                                    Mobile Number
                                    <input type="text" class="form-control" id='mobile' name='mobile'>
                                </div>


                                <div class="col-md-6">
                                    Website
                                    <input type="text" class="form-control" id='website' name='website'>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    Address
                                    <input type="text" class="form-control" id='address' name='address'>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                                <button class="btn btn-dark mt-4" id='save'>Update</button>
                                </div>
                                <hr>
                                <div class="row mt-3">
                                    <div class="col-md-6 mt-5">
                                        <form id="submitupload" enctype="multipart/form-data">
                                        <input type="file" name='file' id='file'><br><br>
                                        <button class="btn btn-dark btn-sm" type="submit" name="submit">Upload image</button>
                                        </form>
                                    </div>
                                    <div class="col-md-4">
                                        Your Logo
<div class="logo" style =" border: 2px solid black;height:17rem">
<img src="../images/lablogo.png" alt="" class="w-100">
</div>
                                    </div>
                                </div>
                    </div>
                </div>
                <div class="row mt-3">
                                <a href='#' data-bs-toggle="modal" data-bs-target="#modal" >Change Password</a>
                                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark text-light">
        <h5 class="modal-title" id="exampleModalLabel">Enter New Test</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form id="form">
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
<?php
 }else{
  header("Location: http://localhost/labreport/labs/");
}
?>
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
    })
</script>

</body>