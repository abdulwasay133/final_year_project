<?php
include 'db.php';
session_start();
if($_SESSION['user']['status'] == 0){

  $user_id = $_SESSION['user']['id'];

$stmt = $dbpdo->prepare("SELECT * FROM users as u INNER JOIN company as c ON u.id = c.user_id WHERE c.user_id = '$user_id'");
$stmt->execute();
$company = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Waiting</title>

    <!-- Meta -->
    <meta name="description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:title" content="Admin Templates - Dashboard Templates">
    <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:type" content="Website">
    


    <link rel="stylesheet" href="assets/css/main.min.css">


  </head>

  <body class="">

    <div class="container">
      <!-- Error container starts -->
      <div class="error-container">
<img src="assets/clock.svg" alt="waiting" class="w-75">
        <h3 class="fw-light mb-5">
        <?php
if(!$company){
  echo "<b>	Pleas Fill the Form Given Below to Register your Company.</b>";
}else{
  echo "<b>	Please wait while our team reviews your details and accepts your request.</b>";
}
?>
	
        </h3>
        <a href="/labreport" class="btn px-4 py-2 fs-5">Back to Home</a>
<?php
if(!$company){
  echo "<a  data-bs-toggle='modal' data-bs-target='#modal'  class='btn mt-3 px-4 py-2 fs-5'>Register Here</a>";
}
?>
        
      </div>
      <!-- Error container ends -->
    </div>





    <div class="modal fade modal-lg" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog dialog-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Company Details</h5>
      </div>

      <div class="modal-body">
        <form action="company/updatecompany.php" method="post">
        <div class="row">
        <div class="col-md-12">
        <div class="mb-3">
        <label>Lab Name</label><span class="text-danger">* </span>
<input type="text" class="form-control" name="labname" placeholder="name" required>
</div>
</div>
        <div class="col-md-6">
        <div class="mb-3">
        <label>Registration No</label><span class="text-danger">* </span>
<input type="text" class="form-control" name="reg_no" placeholder="Registration No" required>
</div>
</div>
        <div class="col-md-6">
        <div class="mb-3">
        <label>owner Name</label><span class="text-danger">* </span>
<input type="text" class="form-control" name="own_name" placeholder="labname" required>
</div>
</div>
        <div class="col-md-6">
        <div class="mb-3">
        <label>Phone Number</label><span class="text-danger">* </span>
<input type="text" class="form-control" name="phone" placeholder="phone" required>
</div>
</div>
        <div class="col-md-6">
        <div class="mb-3">
        <label>email</label><span class="text-danger">* </span>
<input type="email" class="form-control" name="email" placeholder="user@example.com" required>
</div>
</div>
        <div class="col-md-6">
        <div class="mb-3">
        <label>Website Link</label><span class="text-danger">* </span>
<input type="text" class="form-control" name="website" placeholder="www.example.com" required>
</div>
</div>
        <div class="col-md-6">
        <div class="mb-3">
        <label>Many many Year Old your Lab</label><span class="text-danger">* </span>
        <select class="form-select" id="dob" name='dob' value='<?php echo $comp['dob']?>' required>
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
        <div class="col-md-12">
        <div class="mb-3">
        <label>Address</label><span class="text-danger">* </span>
        <textarea name="address" id="" cols="30" rows="5" class="form-control" required></textarea>
</div>
</div>
</div>
      <div class="modal-footer">
        <a type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-primary"  id="shear">Send</button>
        </form>
      </div>
      
    </div>
  </div>
</div>
</div>

  </body>


</html>
 <!-- ************* JavaScript Files ************* -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="assets/js/jquery.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/moment.min.js"></script>

    <!-- ************* Vendor Js Files ************* -->

    <!-- Overlay Scroll JS -->
    <script src="assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
    <script src="assets/vendor/overlay-scroll/custom-scrollbar.js"></script>

    <!-- Apex Charts -->
    <script src="assets/vendor/apex/apexcharts.min.js"></script>
    <script src="assets/JsBarcode.code128.min.js"></script>
    <!-- Raty JS -->
    <script src="assets/vendor/rating/raty.js"></script>
    <script src="assets/vendor/rating/raty-custom.js"></script>

    <!-- Custom JS files -->
    <script src="assets/js/custom.js"></script>

    <!-- Custom JS files -->
<!-- <script type="text/javascript" src="assets/vendor/datatables/dataTables.min.js"></script>
<script type="text/javascript" src="assets/vendor/datatables/pdfmake.min.js"></script>
<script type="text/javascript" src="assets/vendor/datatables/vfs_fonts.js"></script> -->

<?php
 }else{
  header("Location: http://localhost/labreport/");
}
?>