<!doctype html>
<html class="no-js" lang="zxx">
 
<?php
ob_start();
include('navbar.php');
include("admin/db.php");

if(isset($_POST['submit'])){

$email = $_POST['email'];
$pass = $_POST['pass'];
$type = $_POST['type'];

if($type == 'patient'){
	$stmt = $dbpdo->prepare("SELECT * FROM customers WHERE (`cnic` = '$email' AND `password` = '$pass')");
	$stmt->execute();
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
	if($user){
		$_SESSION['patient'] = $user;
		header("Location: http://localhost/labreport/searchreports");
	   }else{
		header("Location: http://localhost/labreport/login.php");
	   }
}else{



if($type == 'lab'){
$stmt = $dbpdo->prepare("SELECT * FROM users WHERE (`email` = '$email' AND `password` = '$pass')");
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

}else{
$stmt = $dbpdo->prepare("SELECT * FROM doctors WHERE (`d_email` = '$email' AND `password` = '$pass')");
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
}

if($user){
 $_SESSION['user'] = $user;
 header("Location: http://localhost/labreport/labs/");
}else{
 header("Location: http://localhost/labreport/login.php");
}
}
}

ob_end_flush(); 
?>

	

				
		<!-- Shop Login -->
		<section class="login section">
			<div class="container">
				<div class="inner">
					<div class="row"> 
						<div class="col-lg-6">
							<div class="login-left">
							
							</div>
						</div>
						<div class="col-lg-6">
							<div class="login-form">
								<h2>Login Here</h2>
								<!-- Form -->
								<form class="form" action="" method="POST">
									<div class="row">

									<div class="col-lg-12 d-flex flex-column">
											<div><label for="Provinces">Accout Type</label><span class="text-danger">*</span></div>
												<select name="type" id="typ" class="form-control w-100" onchange="checkuser(this)">
													<option value="">Select Type</option>
													<option value="doctor">Doctor</option>
													<option value="lab">Laboratory</option>
													<option value="patient">Patient</option>
												</select>
										</div>

										<div class="col-lg-12">
											<div class="form-group">
											<div><label for="Provinces" id="user">Email</label><span class="text-danger">*</span></div>
												<input type="text" id="username" name="email" placeholder="email">
											</div>
										</div>



										<div class="col-lg-12">
											<div class="form-group">
											<div><label for="Provinces">Password</label><span class="text-danger">*</span></div>
												<input type="password" id="password" name="pass" placeholder="Password">
											</div>
										</div>

										</div>
										<div class="col-12">
											<div class="form-group login-btn">
												<button class="btn" name='submit' type="submit">Login</button>
											</div>
											<div class="checkbox">
												<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">Remember me</label>
											</div>
											<a href="#" class="lost-pass">Lost your password ?</a>
										</div>
									</div>
								</form>
								<!--/ End Form -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Login -->
		<script>
			function checkuser(id){
				if(id.value == "patient"){
					document.querySelector('#user').innerHTML = "CNIC"
					document.querySelector('#username').placeholder = "CNIC"
				}else{
					document.querySelector('#user').innerHTML = "Email"
					document.querySelector('#username').placeholder = "Email"
				}

			}
		</script>
		<?php
include('footer.php')
?>

</html>