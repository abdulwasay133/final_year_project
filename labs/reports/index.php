
<?php
include "../header.php";
session_start();
if($_SESSION['user']['status']==true){

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
                Reports
              </li>
              <li class="breadcrumb-item text-primary" aria-current="page">
                Pending Reports
              </li>
            </ol>

          </div>
  
          <div class="app-body">

            <div class="row gx-3">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">Pending Reports</h5>
                  </div>
                  <div class="card-body">

                              
                <div id="data">
                    <div class="d-flex justify-content-center">
                        <img src="../assets/loader1.gif" alt="" class="my-5">
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


<script>
$(document).ready(function(){
function showtest(){
    $.ajax({
        url:"showtest.php",
        type: "POST",
        success:function(data){
            $('#data').html(data);
        }
    });
}
showtest()
})
</script>



<?php
}else{
  header("Location: http://localhost/labreport/login.php");
}
?>




