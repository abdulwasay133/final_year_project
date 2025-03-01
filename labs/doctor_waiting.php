<?php
include 'db.php';
session_start();
if($_SESSION['user']['d_status'] == 0 ){

  $user_id = $_SESSION['user']['d_id'] ;

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

        
      </div>
      <!-- Error container ends -->
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