<?php
ob_start();
if(isset($_POST['submit'])){
	session_start();
include "db.php";
// echo"ok";
$email = $_POST['email'];
$pass = $_POST['pass'];
echo $email;
echo $pass;
$stmt = $dbpdo->prepare("SELECT * FROM admins WHERE (`email` = '$email' AND `password` = '$pass')");
$stmt->execute();
$admin = $stmt->fetch(PDO::FETCH_ASSOC);
// echo($admin['name']);
// if($admin){
 $_SESSION['user'] = $admin;
 header("Location: http://localhost/labreport/admin/index.php");
// }else{
//  header("Location: http://localhost/labreport/login.php");
// }

}
ob_end_flush(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/favicon.svg">


    <link rel="stylesheet" href="assets/fonts/remix/remixicon.css">
    <link rel="stylesheet" href="assets/css/main.min.css">

    <link rel="stylesheet" href="assets/vendor/overlay-scroll/OverlayScrollbars.min.css">

    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/buttons.dataTables.min.css">
	<!-- <script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assest/js/jquery.min.js"></script> -->
    <title>LIMS Lab Report</title>
</head>
<body style="background:url('images/background.jpg');background-repeat: no-repeat;background-size: cover;">
<div class="container">
	<div class="row mt-5">
	<!-- Section: Design Block -->
<section class="">
  <!-- Jumbotron -->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start" >
    <div class="container">
      <div class="row gx-lg-5 align-items-center">



        <div class="col-lg-4 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-header text-center bg-primary text-white">
              <h3>Login Here</h3>
            </div>
            
            <div class="card-body px-md-5">
            <form class="form" action="" method="POST">
									<div class="row">
										<div class="col-lg-12  mt-3">
											<div class="form-group">
                        <label for="user">Email</label>
												<input class="form-control" type="text" id="username" name="email" placeholder="email">
											</div>
										</div>

										<div class="col-lg-12  mt-3">
											<div class="form-group">
                      <label for="user">Password</label>
												<input  class="form-control" type="password" id="password" name="pass" placeholder="Password">
											</div>
										</div>

										</div>
										<div class="col-12 mt-3">
											<div class="form-group login-btn">
												<button class="btn" name='submit' type="submit">Login</button>
											</div>

										</div>
									</div>
								</form>
            </div>
          </div>
        </div>


        <!-- <div class="col-lg-6 mb-5 mb-lg-0 text-light p-2">
          <div class="mb-5">
          <h1 class=" display-3 fw-bold p-0 m-0">
          <span class="text-primary p-0 m-0">L I M S</span><br /></h1>
            <h4 class="p-0 m-0">Laboratory Information Management System</h4>
          </div>
          <p class="text-light">
            LIMS Can Manage your Reports.Ptients previous Records Doctor management report summry Powerd By AW Soft Solutions
          </p>
        </div> -->
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>
</div>
</div>
</body>
