<!doctype html>
<html class="no-js" lang="eng">
    
<?php
ob_start();
include('navbar.php');
include('admin/db.php');


if(isset($_POST['SubmitButton'])){ 
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
    
	$user = $dbpdo->prepare("INSERT INTO users(`id`,`name`,`email`,`password`) VALUES(Null,'$name','$email','$pass')")->execute();

	header("Location: http://localhost/labreport/login.php");

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
								<h2>Register Here</h2>
								<p>Do you have already account ? <a href="login.php">login Here</a></p>
								<!-- Form -->
								<form class="form" action="" method="POST">
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<input type="text" id="username" name="name" placeholder="First Name">
											</div>
										</div>

										<div class="col-lg-12">
											<div class="form-group">
												<input type="email" id="email" name="email" placeholder="example@gmail.com">
											</div>
										</div>

										<div class="col-lg-12">
											<div class="form-group">
												<input type="password" id="password" name="pass" placeholder="Password">
											</div>
										</div>

										<div class="col-lg-12">
											<div class="form-group">
												<input type="password" id="comfirm" name="confirmpass" placeholder="Confirm">
											</div>
										</div>

										</div>
										<div class="col-12">
											<div class="form-group login-btn">
												<input name="SubmitButton" class="btn" value="Register" type="submit">
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