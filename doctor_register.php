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
	$phone = $_POST['phone'];
	$province = $_POST['province'];
	$district = $_POST['district'];
	$address = $_POST['address'];
	// echo $pass;
	echo $confirm;
    if($pass == $confirm){
	$user = $dbpdo->prepare("INSERT INTO doctors(`d_id`,`d_name`,`d_phone`,`d_address`,`user_id`,`d_province`,`d_district`,`d_email`,`password`,`status`)
	 										VALUES(Null,'$name','$phone','$address','13','$province','$district','$email','$pass',0)")->execute();
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
								<h2>Doctor Register Here</h2>
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
												<label for="phone">Phone</label><span class="text-danger">*</span>
												<input type="text" id="phone" name="phone" placeholder="0312-0000000">
											</div>
										</div>
										<div class="col-lg-6 d-flex flex-column">
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

										<div class="col-lg-6 d-flex flex-column">
												<div><label for="district">District</label><span class="text-danger">*</span></div>
												<div id="districts" class="w-100">
												<select name="district"  class="form-control">
													<option value="">Select District </option>
												</select>
												</div>
										</div>

										<div class="col-lg-12">
											<div class="form-group">
											<label for="address">Address</label><span class="text-danger">*</span>
											<textarea name="address" id="address" class="form-control"></textarea>
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
<script>
	$(document).ready(function(){
		$('#province').change(function(){
			id = this.value;

			$.ajax({
				url:'fetchdistrict.php',
				type:'post',
				data:{id:id},
				success:function(data){
					$('#districts').html(data);
				}
			})
		})
	})
</script>
</html>