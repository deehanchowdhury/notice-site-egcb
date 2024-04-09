<?php
ini_set('display_errors','Off');
// $type = isset($_GET["id"])? " WHERE notices.notice_type_id = '".$type."' ":" ";

$type = $_GET["id"];

$con = mysqli_connect("localhost","root","","egcb_notice");
if (isset($_GET["id"])){
	$res = mysqli_query($con,"select * from notices join notice_types on notices.notice_type_id = notice_types.id WHERE notice_type_id = '".$type."'  order by notice_date desc");
}
else {
	$res = mysqli_query($con,"select * from notices join notice_types on notices.notice_type_id = notice_types.id  order by notice_date desc");
}
$notice_type_res = mysqli_query($con, "select * from notice_types");

?>
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet">
        
        <!-- title of site -->
        <title>EGCB Notice Board</title>

        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>
       
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!--linear icon css-->
		<link rel="stylesheet" href="assets/css/linearicons.css">

        <!--flaticon.css-->
		<link rel="stylesheet" href="assets/css/flaticon.css">

		<!--animate.css-->
        <link rel="stylesheet" href="assets/css/animate.css">

        <!--owl.carousel.css-->
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
		
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link rel="stylesheet" href="assets/css/bootsnav.css" >	
        
        <!--style.css-->
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="assets/css/responsive.css">

		<!--table.css-->
		<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"> -->
    	<link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		
        <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
	
	<body>
		<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
	
		<!--welcome-hero start -->
		<section id="home" class="welcome-hero">

			<!-- top-area Start -->
			<div class="top-area">
				<div class="header-area">
					<!-- Start Navigation -->
				    <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

				        <div class="container">

				            <!-- Start Header Navigation -->
				            <div class="navbar-header">
				                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
				                    <i class="fa fa-bars"></i>
				                </button>
				                <a class="navbar-brand" href="index.html">EGCB Employee Login<span></span></a>

				            </div><!--/.navbar-header-->
				            <!-- End Header Navigation -->

				            <!-- Collect the nav links, forms, and other content for toggling -->
				            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
				                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
				                    <li class=" scroll active"><a href="#home">home</a></li>
				                    <li class="scroll"><a href="https://egcb.gov.bd/">portal</a></li>
				                    <li class="dropdown">
										
										  
											<button class="dropbtn" onclick="dropDown()">NOTICE CATEGORY
												<i class="fa fa-caret-down"></i>
											</button>
											<div class="dropdown-content" id="myDropdown">
												<a href="index-2.php">All</a>
												<?php while($row= mysqli_fetch_assoc($notice_type_res) ) {?>
												<a href="index-2.php?id=<?= $row["id"] ?>"><?php echo $row["name"]?></a>
												<?php } ?>
											</div>
										
									</li>
				                    <li class="scroll"><a href="logout.php">logout</a></li>
				                    
				                </ul><!--/.nav -->
				            </div><!-- /.navbar-collapse -->
					
				        </div><!--/.container-->
				    </nav><!--/nav-->
				    <!-- End Navigation -->
				</div><!--/.header-area-->
			    <div class="clearfix"></div>

			</div><!-- /.top-area-->
			<!-- top-area End -->

			<div class="container">
				<div class="welcome-hero-txt">
					<div class="service-content">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="single-service-item">
								<div class="single-service-icon">
									<!-- <i class="flaticon-car" src=""></i> -->
									<img src="./assets/logo/notice_icon.png" alt="" style="width:80px;height:80px;">
								</div>
								<h2><a href="#">Notices</a></h2>
								<p>
									Find all notices.   
								</p>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="single-service-item">
								<div class="single-service-icon">
									<!-- <i class="flaticon-car-repair"></i> -->
									<img src="./assets/logo/meeting-icon.png" alt="" style="width:80px;height:80px;">
								</div>
								<h2><a href="#">Meetings</a></h2>
								<p>
									All upcoming/Scheduled zoom links.  
								</p>
							</div>
						</div>
						
					</div>
				</div>
				</div>
			</div>

			

		</section><!--/.welcome-hero-->
		<!--welcome-hero end -->

		<!--service start -->
	
		<!--service end-->

		<!--new-cars start -->
		<section id="new-cars" class="new-cars">
			<div class="container">
			<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"> -->
				<div class="section-header">
					
					<h2>Notice Board</h2>
				</div><!--/.section-header-->
				<table class="table table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Notice Title</th>
                <th>Date</th>
                <th>Type</th>
            </tr>
            
        </thead>
        <tbody>
            <?php $id = 0; while($row = mysqli_fetch_assoc($res)) { $id = $id + 1; ?>
            <tr>
                <td><?php echo $id?></td>
                <td><a href="https://notice.egcb.com.bd/<?= $row['file'] ?>"><?php echo $row['title']?></a></td>
                <td><?php $datef = date("d/m/y", strtotime($row['notice_date'])); echo $datef?></td>
                <td><?php echo $row['name']?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
			</div><!--/.container-->

		</section><!--/.new-cars-->
		

		

		<!--contact start-->
		<footer id="contact"  class="contact">
			<div class="container">
				<div class="footer-top">
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="single-footer-widget">
								<div class="footer-logo">
									<a href="index.html">EGCB</a>
								</div>
								<p>
									We dream to contribute to Building Smart Bangladesh together with all other sectors!
								</p>
								<div class="footer-contact">
									<p>info@egcb.com.bd</p>
									<p>PABX: +88-02-55138633-36</p>
								</div>
							</div>
						</div>
						<div class="col-md-2 col-sm-6">
							<div class="single-footer-widget">
								<h2>about egcb</h2>
								<ul>
									<li><a href="https://egcb.gov.bd/site/page/90943a2f-dd39-4f06-ace7-6c766c060f52/-">about us</a></li>
									<li><a href="https://egcb.gov.bd/site/page/8e28773a-173e-428a-a2a4-52584cc8bd0a/-">Plants</a></li>
									<li><a href="https://egcb.gov.bd/site/page/d68af0ab-758b-459a-b429-49bdd9376450/-">Project </a></li>
									<li><a href="https://egcb.gov.bd/site/page/d0fdd5f5-3d7a-4dd9-9c50-52586faa075c/-">Contact</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 col-xs-12">
							<div class="single-footer-widget">
								<h2>Top Numbers</h2>
								<div class="row">
									<div class="col-md-7 col-xs-6">
										<ul>
											<li><a href="#">Managing Director</a></li>
											<li><a href="#">Chief Engineer 2x120</a></li>
											<li><a href="#">Chief Engineer 335</a></li>
											<li><a href="#">Chief Engineer 412 </a></li>
											<li><a href="#">Project Director Sonagazi 75 MW Solar</a></li>
										</ul>
									</div>
									<div class="col-md-5 col-xs-6">
										<ul>
											<li><a href="#">01766690401</a></li>
											<li><a href="#">01766690490</a></li>
											<li><a href="#">01766690540</a></li>
											<li><a href="#">01766690590</a></li>
											<li><a href="#">01766690640</a></li>
											
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-offset-1 col-md-3 col-sm-6">
							<div class="single-footer-widget">
								<h2>news letter</h2>
								<div class="footer-newsletter">
									<p>
										Subscribe to get latest news  update and informations
									</p>
								</div>
								<div class="hm-foot-email">
									<div class="foot-email-box">
										<input type="text" class="form-control" placeholder="Add Email">
									</div><!--/.foot-email-box-->
									<div class="foot-email-subscribe">
										<span><i class="fa fa-arrow-right"></i></span>
									</div><!--/.foot-email-icon-->
								</div><!--/.hm-foot-email-->
							</div>
						</div>
					</div>
				</div>
				<div class="footer-copyright">
					<div class="row">
						<div class="col-sm-6">
							<p>
								&copy; copyright.designed and developed by <a href="https://www.themesine.com/">EGCB ICT Team</a>.
							</p><!--/p-->
						</div>
						<div class="col-sm-6">
							<div class="footer-social">
								<a href="#"><i class="fa fa-facebook"></i></a>	
								<a href="#"><i class="fa fa-instagram"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-pinterest-p"></i></a>
								<a href="#"><i class="fa fa-behance"></i></a>	
							</div>
						</div>
					</div>
				</div><!--/.footer-copyright-->
			</div><!--/.container-->

			<div id="scroll-Top">
				<div class="return-to-top">
					<i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
				</div>
				
			</div><!--/.scroll-Top-->
			
        </footer><!--/.contact-->
		<!--contact end-->


		
		<!-- Include all js compiled plugins (below), or include individual files as needed -->

		<script src="assets/js/jquery.js"></script>
        
        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		<!--bootstrap.min.js-->
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="assets/js/bootsnav.js"></script>

		<!--owl.carousel.js-->
        <script src="assets/js/owl.carousel.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

        <!--Custom JS-->
        <script src="assets/js/custom.js"></script>
        
		<!-- Table JS -->
		<script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
		<script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
		
		<script>
			$(document).ready( function() {
				$('.table').DataTable();       
			});
		</script>
		<script>
		/* When the user clicks on the button, 
		toggle between hiding and showing the dropdown content */
		function dropDown() {
		document.getElementById("myDropdown").classList.toggle("show");
		}

		// Close the dropdown if the user clicks outside of it
		window.onclick = function(e) {
			if (!e.target.matches('.dropbtn')) {
			var myDropdown = document.getElementById("myDropdown");
				if (myDropdown.classList.contains('show')) {
				myDropdown.classList.remove('show');
				}
			}
		}
		</script>
    </body>
	
</html>