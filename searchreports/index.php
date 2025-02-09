<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page with Background Image</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap" rel="stylesheet">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="../css/bootstrap.min.css">
<!-- Nice Select CSS -->
<link rel="stylesheet" href="../css/nice-select.css">
<!-- Font Awesome CSS -->
<link rel="stylesheet" href="../css/font-awesome.min.css">
<!-- icofont CSS -->
<link rel="stylesheet" href="../css/icofont.css">
<!-- Slicknav -->
<link rel="stylesheet" href="../css/slicknav.min.css">
<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="../css/owl-carousel.css">
<!-- Datepicker CSS -->
<link rel="stylesheet" href="../css/datepicker.css">
<!-- Animate CSS -->
<link rel="stylesheet" href="../css/animate.min.css">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="../css/magnific-popup.css">

<!-- Medipro CSS -->
<link rel="stylesheet" href="../css/normalize.css">
<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="../css/responsive.css">

<!-- Color CSS -->
<link rel="stylesheet" href="../css/color/color1.css">
<!--<link rel="stylesheet" href="css/color/color2.css">-->
<!--<link rel="stylesheet" href="css/color/color3.css">-->
<!--<link rel="stylesheet" href="css/color/color4.css">-->
<!--<link rel="stylesheet" href="css/color/color5.css">-->
<!--<link rel="stylesheet" href="css/color/color6.css">-->
<!--<link rel="stylesheet" href="css/color/color7.css">-->
<!--<link rel="stylesheet" href="css/color/color8.css">-->
<!--<link rel="stylesheet" href="css/color/color9.css">-->
<!--<link rel="stylesheet" href="css/color/color10.css">-->
<!--<link rel="stylesheet" href="css/color/color11.css">-->
<!--<link rel="stylesheet" href="css/color/color12.css">-->

<link rel="stylesheet" href="#" id="colors">
    <style>
        body {
            background-image: url('https://thqgojra.punjab.gov.pk/system/files/Pathology1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .search-container {
            background-color: rgba(255, 255, 255, 0.8); /* Optional: To make the search form stand out */
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
<header class="header" >
			<!-- Topbar -->

			<!-- End Topbar -->
			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="inner">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-12">
								<!-- Start Logo -->
								<div class="logo">
									<a href="index-2.html"><img src="../img/logo.png" alt="#"></a>
								</div>
								<!-- End Logo -->
								<!-- Mobile Nav -->
								<div class="mobile-nav"></div>
								<!-- End Mobile Nav -->
							</div>
							<div class="col-lg-7 col-md-9 col-12">
								<!-- Main Menu -->
								<div class="main-menu">
									<nav class="navigation">
										<ul class="nav menu" id="myDIV">
                                            <li class="link"><a href="/labreport">Home</a></li>
											<li class="link"><a href="/labreport/#about">About</a></li>
											<li class="link"><a href="#">Services </a></li>
											<li class="link"><a href="#">Blogs </i></a></li>
											<li class="link"><a href="contact.html">Contact Us</a></li>
										</ul>
									</nav>
								</div>
								<!--/ End Main Menu -->
							</div>
							<div class="col-lg-2 col-12">
								<div class="get-quote">
                                <?php
if(empty($_SESSION['user'])){
?>
<a href="login.php" class="btn">  Login / Signup   </a>   
                          
<?php }else{ ?>
    <a href="labs/" class="btn">  Dashboard   </a> 
  <?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Header Inner -->
		</header>
		
    <div class="container">
        <h1 class="mt-5 text-center">Search Your Report</h1>
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="search-container">
                    
                        <div class="input-group mb-3">
                            <input id='cnic' type="text" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="search-button">
                            <div class="input-group-append">
                                <button  class="btn btn-danger" data-bs-dismiss="modal" type="button" id="search">Search</button>
                            </div>
                        </div>
                    
                </div>

 
            </div>
            <div class="search-container mt-3">
                <div id='table'></div>
                </div>
        </div>
    </div>




    <footer id="footer" class="footer ">
			<!-- Footer Top -->
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer">
								<h2>About Us</h2>
								<p>Lorem ipsum dolor sit am consectetur adipisicing elit do eiusmod tempor incididunt ut labore dolore magna.</p>
								<!-- Social -->
								<ul class="social">
									<li><a href="#"><i class="icofont-facebook"></i></a></li>
									<li><a href="#"><i class="icofont-google-plus"></i></a></li>
									<li><a href="#"><i class="icofont-twitter"></i></a></li>
									<li><a href="#"><i class="icofont-vimeo"></i></a></li>
									<li><a href="#"><i class="icofont-pinterest"></i></a></li>
								</ul>
								<!-- End Social -->
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer f-link">
								<h2>Quick Links</h2>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<ul>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Home</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>About Us</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Services</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Our Cases</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Other Links</a></li>	
										</ul>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<ul>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Consuling</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Finance</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Testimonials</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>FAQ</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Contact Us</a></li>	
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer">
								<h2>Open Hours</h2>
								<p>Lorem ipsum dolor sit ame consectetur adipisicing elit do eiusmod tempor incididunt.</p>
								<ul class="time-sidual">
									<li class="day">Monday - Fridayp <span>8.00-20.00</span></li>
									<li class="day">Saturday <span>9.00-18.30</span></li>
									<li class="day">Monday - Thusday <span>9.00-15.00</span></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer">
								<h2>Newsletter</h2>
								<p>subscribe to our newsletter to get allour news in your inbox.. Lorem ipsum dolor sit amet, consectetur adipisicing elit,</p>
								<form action="https://wpthemesgrid.com/themes/medikit/mail/mail.php" method="get" target="_blank" class="newsletter-inner">
									<input name="email" placeholder="Email Address" class="common-input" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Your email address'" required="" type="email">
									<button class="button"><i class="icofont icofont-paper-plane"></i></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Footer Top -->
			<!-- Copyright -->
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-12">
							<div class="copyright-content">
								<p>© Copyright 2018  |  All Rights Reserved by <a href="https://www.wpthemesgrid.com/" target="_blank">wpthemesgrid.com</a> </p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Copyright -->
		</footer>

        <!-- <script data-cfasync="false" src="../js/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<!-- jquery Migrate JS -->
		


        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reports</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../labs/reports/reportall.php" id='myForm' method="GET">
      <div class="modal-body">
      <div id="tests"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Print</button>
                                </form>
      </div>
    </div>
  </div>
</div>



</body>
</html>


<script>


$(document).ready(function(){

    $('#search').click(function(){
        cnic = $('#cnic').val();
        console.log(cnic)
        $.ajax({
                url : "showresults.php",
                type : "POST",
                data : {cnic:cnic},
                success : function(data){
                    $('#table').html(data);

                }
            });
    })
    // console.log($('#myModal'));
    $(document).on('click', '.display', function() { 
                
                id = $(this).data('id');
                element = this;
                $.ajax({
                    url : 'showreports.php',
                    type : 'POST',
                    data : {id : id},
                    success : function (data){
                        // console.log(data);
                        if(data){
                       
                        $("#tests").html(data); 
                        $('#myModal').modal('show');
                    }
                    }
                })
            
             });

 

        });
        
</script>
