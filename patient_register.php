<!doctype html>
<html class="no-js" lang="eng">
    
<?php
ob_start();
include('navbar.php');
include('admin/db.php');

$stmt = $dbpdo->prepare("SELECT * FROM provinces");
$stmt->execute();
$provinces = $stmt->fetchAll();

if(isset($_POST['SubmitButton'])){ 
	$name = $_POST['first']. $_POST['last'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$confirm = $_POST['confirm'];
	$cnic = $_POST['cnic'];

    if($pass == $confirm){
	$user = $dbpdo->prepare("INSERT INTO customers(`id`,`name`,`email`,`password`,`cnic`)
	 										VALUES(Null,'$name','$email','$pass','$cnic')")->execute();
	 header("Location: http://localhost/labreport/login.php");
}else{
	echo "Password Not matched";
} 
	

} 
ob_end_flush(); 
?>
	

				
		<!-- Shop Login -->
		<section class="login section">
			<div class="container">
				<div class="shadow">
					<div class="row"> 
						<div class="col-lg-12">
							<div class="login-left">
							
							</div>
						</div>
						<div class="col-lg-12">
							<div class="login-form">
								<h2>Patients Register Here</h2>
								<p>Do you have already account ? <a href="login.php">login Here</a></p>
								<!-- Form -->
								<form class="form" action="" method="POST">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label for="first">First Name</label><span class="text-danger">*</span>
												<input type="text" id="first" name="first" placeholder="Jhon">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label for="Last">Last Name</label><span class="text-danger">*</span>
												<input type="text" id="last" name="last" placeholder="Deo">
											</div>
										</div>

										<div class="col-lg-6">
											<div class="form-group">
												<label for="email">Email</label><span class="text-danger">*</span>
												<input type="email" id="email" name="email" placeholder="example@gmail.com">
											</div>
										</div>

										<div class="col-lg-6">
											<div class="form-group">
												<label for="cnic">CNIC</label><span class="text-danger">*</span>
												<input type="text" id="cnic" name="cnic" placeholder="1210109876544">
											</div>
										</div>



										<div class="col-lg-6">
											<div class="form-group">
											<label for="password">Password</label><span class="text-danger">*</span>
												<input type="password" id="password" name="pass" placeholder="Password">
											</div>
										</div>

										<div class="col-lg-6">
											<div class="form-group">
											<label for="confirm">Confirm Password</label><span class="text-danger">*</span>
												<input type="password" id="comfirm" name="confirm" placeholder="Confirm">
											</div>
										</div>


										


										</div>
										<div class="col-12">
											<div class="form-group login-btn">
												<input name="SubmitButton" class="btn btn-primary" value="Register" type="submit">
											</div>
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
		
		<?php
include('footer.php')
?>

</html>