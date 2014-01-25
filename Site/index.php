<?
include("connection/cn.php");
if($_REQUEST["Register"]=="True")
{
	mysql_query("Insert into doctors set
					name = '".$_POST["name"]."',
					email = '".$_POST["email"]."',
					pwd = '1234',
					mobile = '".$_POST["mobile"]."',
					cat_id = '".$_POST["cat_id"]."',
					pmdc_code = '".$_POST["pmdc_code"]."',
					createdDate = now()") or die(mysql_error());
	$id = mysql_insert_id();
	$_SESSION["sess_doc_id"] = $id;
	$_SESSION["sess_doc_name"] = $_POST["name"];
	$_SESSION["sess_doc_email"] = $_POST["email"];
	
	header("location: blog.php");
	exit;
}

if($_REQUEST["Login"]=="True")
{
	$result = mysql_query("Select * from doctors Where email = '".$_POST["email"]."' and pwd = '1234'") or die(mysql_error());
	if(mysql_num_rows($result)>0)
	{
		$row = mysql_fetch_array($result);
		$_SESSION["sess_doc_id"] = $row["id"];
		$_SESSION["sess_doc_name"] = $row["name"];
		$_SESSION["sess_doc_email"] = $row["email"];
		header("location: blog.php");
		exit;
	}
	else
	{
		header("location: index.php?er=1");
		exit;
	}
}

if($_REQUEST["act"]=="logout")
{
	unset($_SESSION["sess_doc_id"]);
	unset($_SESSION["sess_doc_name"]);
	unset($_SESSION["sess_doc_email"]);
	header("location: index.php");
	exit;
}


?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Title here -->
		<title>Login / Register</title>
		<!-- Description, Keywords and Author -->
		<? include("inc.meta.php");?>
	</head>
	
	<body>
		
		<!-- Header Bar Start -->
		<? include("inc.headerMenu.php");?>
		<!-- Navigation Menu Button -->
			
		
		
		<!-- Head Start -->
		<div class="head inner-pages">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-4">
						<!-- Logo and Head Text -->
						<div class="logo">
							<!-- Logo Icon and Heading -->
							<img src="img/logo.png" class="img-responsive" alt="" /><span><a href="index.html"></a></span>
						</div>
					</div>
					<div class="col-md-3 col-sm-4">
						<!-- Social Icon Menu -->
						<div class="social">
							<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
							<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
							<a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
							<a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
						</div>
					</div>
					<div class="col-md-3 col-sm-4">
						<div class="search">
							<form>
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Text to search">
									<span class="input-group-btn">
										<button class="btn btn-danger" type="button"><i class="fa fa-search"></i></button>
									</span>
								</div>
							</form>
						</div>
					</div>
					<div class="col-md-3 hidden-sm">
					</div>
				</div>
			</div>
		</div>
		<!-- Menu Bar End -->
		
		
				<!-- Inner Page Heading -->
				<div class="inner-page sign">
					<div class="container">
						<h2><i class="fa fa-sign-in red"></i><strong>Sign In / Sign Up</strong></h2>
				  <div class="sign-content">
							<div class="row">
								<div class="col-md-4 col-sm-4">
									<!-- Sign In Area -->
									<div class="sign-in">
										<h3><i class="fa fa-user red"></i> &nbsp;Sign In</h3>
										<!-- Sign in Form Start -->
										<form class="form-horizontal" role="form" name="login" method="post" action="">
											<div class="form-group">
												<label for="User Name" class="col-lg-3 control-label">Username</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" id="email" name="email">
												</div>
											</div>
											<div class="form-group">
												<label for="password" class="col-lg-3 control-label">Password</label>
												<div class="col-lg-9">
													<!--<input type="password" class="form-control" id="pwd" name="pwd">-->1234
												</div>
											</div>
											<div class="form-group">
												<div class="col-lg-offset-3 col-lg-9">
													<button type="submit" class="btn btn-info">Login</button>
                                                    <input type="hidden" name="Login" value="True">
												</div>
											</div>
										</form>
										<!-- Sign in form End -->
										<h4><span>OR</span></h4>
										<!-- Sign In with Social media -->
										<div class="social-sign">
											<a href="#" class="btn btn-primary"><i class="fa fa-facebook"></i>&nbsp; Sign in With Facebook</a>&nbsp;
											<a href="#" class="btn btn-danger"><i class="fa fa-google-plus"></i>&nbsp; Sign in With Google</a>
										</div>
									</div>
								</div>
								<div class="col-md-3 col-sm-3">
									<div class="well br-lblue white">
										<h5>Milique Suntculpa</h5>
										<p> Nam libero tempo soluta nobis est eligendi optio cumque nihil impedit quo minus id qxime placeat facere posnis voluptas assunis dolor repellendus. </p>
									</div>
									<div class="well br-orange white">
										<h5>Wefoice Sntram</h5>
										<p> Nam libero tempo soluta nobis edi optio cumque nihil impedit quo miod maxime placeat facere posnis voluptas assumenda enis dolor repellendus. </p>
									</div>
								</div>
								<div class="col-md-5 col-sm-5">
									<!-- Sign Up area -->
									<div class="sign-up">
										<h3><i class="fa fa-user green"></i> &nbsp;Sign Up for New Account</h3>
										<!-- Sign up Form Start -->
										<form class="form-horizontal" role="form" name="register" method="post" action="">
											<div class="form-group">
												<label for="Name" class="col-lg-3 control-label">Name</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" id="name" name="name">
												</div>
											</div>
											<div class="form-group">
												<label for="UserName" class="col-lg-3 control-label">PMDC</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" id="pmdc_code" name="pmdc_code">
												</div>
											</div>
                                            <div class="form-group">
												<label for="UserName" class="col-lg-3 control-label">Mobile#</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" id="mobile" name="mobile">
												</div>
											</div>
                                            <div class="form-group">
												<label for="UserName" class="col-lg-3 control-label">Specialization</label>
												<div class="col-lg-9">
													<select name="cat_id">
                                                    	<?
                                                        $resultCat = mysql_query("Select * from category order by name asc");
														while($rowCat = mysql_fetch_array($resultCat))
														{
														?>
                                                        <option value="<?=$rowCat["id"]?>"><?=$rowCat["name"]?></option>
														<?
														}
														?>
                                                    </select>
												</div>
											</div>
                                            <div class="form-group">
												<label for="Email" class="col-lg-3 control-label">Email</label>
												<div class="col-lg-9">
													<input type="email" class="form-control" id="email" name="email">
												</div>
											</div>
											<div class="form-group">
												<label for="password" class="col-lg-3 control-label">Password</label>
												<div class="col-lg-9">
													1234<!--<input type="password" class="form-control" id="pwd" name="pwd">-->
												</div>
											</div>
											<div class="form-group">
												<div class="col-lg-offset-3 col-lg-9">
													<input type="hidden" name="Register" value="True">
                                                    <button type="submit" class="btn btn-info">Sign Up</button>&nbsp;
													<button type="reset" class="btn btn-default">Reset</button>
												</div>
											</div>
										</form>
										<!-- Sign in form End -->
										<h4><span>OR</span></h4>
										<!-- Sign In with Social media -->
										<div class="social-sign">
											<a href="#" class="btn btn-primary"><i class="fa fa-facebook"></i>&nbsp; Sign up With Facebook</a>&nbsp;
											<a href="#" class="btn btn-danger"><i class="fa fa-google-plus"></i>&nbsp; Sign up With Google</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				
		<!-- CTA Start -->
		
		
		
		<!-- CTA End -->
		
		
		
		<!-- Sponsor Start -->
		
		<div class="sponsor">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
                    	<h2 align="left">Sponsors</h2>
						<div class="sponsor-item">
							<a href="#"><img src="img/sponsor/amazon.png" class="img-responsive" alt="" /></a>
							<a href="#"><img src="img/sponsor/facebook.png" class="img-responsive" alt="" /></a>
							<a href="#"><img src="img/sponsor/google.png" class="img-responsive" alt="" /></a>
							<a href="#"><img src="img/sponsor/skype.png" class="img-responsive" alt="" /></a>
							<a href="#"><img src="img/sponsor/twitter.png" class="img-responsive" alt="" /></a>
							<a href="#"><img src="img/sponsor/youtube.png" class="img-responsive" alt="" /></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Sponsor End -->
		
		<!-- Scroll to top -->
		<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span> 
		
		<!-- Footer Start -->
		
		<? include("inc.footer.php");?>
		
		<!-- Footer End -->		
		
		<!-- Javascript files -->
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap JS -->
		<script src="js/bootstrap.min.js"></script>
		<!-- jQuery REVOLUTION Slider  -->
		<script type="text/javascript" src="js/jquery.themepunch.plugins.min.js"></script>
		<script type="text/javascript" src="js/jquery.themepunch.revolution.min.js"></script>
		<!-- jQuery way points -->
		<script src="js/waypoints.min.js"></script>
		<!-- Jquery for Countdown Watch -->
		<script type="text/javascript" src="js/jquery.countdown.min.js"></script>
		<!-- Portfolio JS -->
		<!-- Pretty Photo, Filter And Isotope JS -->
		<script type="text/javascript" src="js/filter.js"></script>
		<script type="text/javascript" src="js/isotope.js"></script>
		<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
		<!-- Carusole JS -->
		<script type="text/javascript" src="js/jquery.carouFredSel-6.2.1-packed.js"></script>
		<!-- Respond JS for IE8 -->
		<script type="text/javascript" src="js/respond.min.js"></script>
		<!-- HTML5 Support for IE -->
		<script type="text/javascript" src="js/html5shiv.js"></script>
		<!-- Custom JS -->
		<script type="text/javascript" src="js/custom.js"></script>
	</body>	
</html>