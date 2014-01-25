<?
include("connection/cn.php");
include("inc.checkSession.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Title here -->
		<title>Forum</title>
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
		<div class="inner-page blog">
			<div class="container">
				<h2><i class="fa fa-comments orange"></i><strong>Patient's Wall</strong></h2>
		  <div class="inner-blog">
					<div class="row">
						<div class="col-md-8 col-sm-8">
							<!-- The new post done by user's all in the post block -->
							<div class="blog-post">
								<!-- Entry is the one post for each user -->
								<div class="entry">
									<!-- Heading of the  post -->
									<h3><a href="blogDetail.php">My eye swells</a></h3>
									
									<!-- Meta for this block -->
									<div class="meta">
										<i class="fa fa-calendar"></i>&nbsp; Jan 23, 2014 &nbsp;&nbsp;&nbsp;<i class="fa fa-user"></i>&nbsp; Admin &nbsp;&nbsp;&nbsp;<i class="fa fa-folder-open"></i><a href="#">&nbsp; General</a> <span class="pull-right"><i class="fa fa-comment"></i> <a href="#">&nbsp;2 Comments</a></span>
									</div>
									<!-- Post Images -->
									<div class="blog-img">
										<img src="disease/eye.jpg" class="img-responsive img-thumbnail" alt="" />
									</div>
									<!-- Para -->
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vulputate eros nec odio egestas in dictum nisi vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse porttitor luctus imperdiet. <a href="#">Praesent ultricies</a> enim ac ipsum aliquet pellentesque. Nullam justo nunc, dignissim at convallis posuere, sodales eu orci. Duis a risus sed dolor placerat semper quis in urna. Nam risus magna, fringilla sit amet blandit viverra, dignissim eget est. Ut <strong>commodo ullamcorper risus nec</strong> mattis. Fusce imperdiet ornare dignissim. Donec aliquet convallis tortor, et placerat quam posuere posuere. Morbi tincidunt posuere turpis eu laoreet. Nulla facilisi. Aenean at massa leo. Vestibulum in varius arcu.</p>
								</div>
								
								<!-- Second-Entry -->
								<div class="entry">
									<!-- Heading of the  post -->
									<h3><a href="blogDetail.php">Meray paon kharab rehtay ha</a></h3>
									
									<!-- Meta for this block -->
									<div class="meta">
										<i class="fa fa-calendar"></i>&nbsp; Jan 13, 2014 &nbsp;&nbsp;&nbsp;<i class="fa fa-user"></i>&nbsp; Admin &nbsp;&nbsp;&nbsp;<i class="fa fa-folder-open"></i><a href="#">&nbsp; General</a> <span class="pull-right"><i class="fa fa-comment"></i> <a href="#">&nbsp;5 Comments</a></span>
									</div>
									<!-- Post Images -->
									<div class="blog-img">
										<img src="disease/foot.jpg" class="img-responsive img-thumbnail" alt="" />
									</div>
									<!-- Para -->
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vulputate eros nec odio egestas in dictum nisi vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse porttitor luctus imperdiet. <a href="#">Praesent ultricies</a> enim ac ipsum aliquet pellentesque. Nullam justo nunc, dignissim at convallis posuere, sodales eu orci. Duis a risus sed dolor placerat semper quis in urna. Nam risus magna, fringilla sit amet blandit viverra, dignissim eget est. Ut <strong>commodo ullamcorper risus nec</strong> mattis. Fusce imperdiet ornare dignissim. Donec aliquet convallis tortor, et placerat quam posuere posuere. Morbi tincidunt posuere turpis eu laoreet. Nulla facilisi. Aenean at massa leo. Vestibulum in varius arcu.</p>
								</div>
                                
                                <!-- Third-Entry -->
						  <div class="entry">
									<!-- Heading of the  post -->
									<h3><a href="blogDetail.php">Ear problem</a></h3>
									
									<!-- Meta for this block -->
									<div class="meta">
										<i class="fa fa-calendar"></i>&nbsp; oct 13, 2013 &nbsp;&nbsp;&nbsp;<i class="fa fa-user"></i>&nbsp; Admin &nbsp;&nbsp;&nbsp;<i class="fa fa-folder-open"></i><a href="#">&nbsp; General</a> <span class="pull-right"><i class="fa fa-comment"></i> <a href="#">&nbsp;25 Comments</a></span>
									</div>
									<!-- Post Images -->
									<div class="blog-img">
										<img src="disease/ear.jpg" class="img-responsive img-thumbnail" alt="" />
									</div>
									<!-- Para -->
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vulputate eros nec odio egestas in dictum nisi vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse porttitor luctus imperdiet. <a href="#">Praesent ultricies</a> enim ac ipsum aliquet pellentesque. Nullam justo nunc, dignissim at convallis posuere, sodales eu orci. Duis a risus sed dolor placerat semper quis in urna. Nam risus magna, fringilla sit amet blandit viverra, dignissim eget est. Ut <strong>commodo ullamcorper risus nec</strong> mattis. Fusce imperdiet ornare dignissim. Donec aliquet convallis tortor, et placerat quam posuere posuere. Morbi tincidunt posuere turpis eu laoreet. Nulla facilisi. Aenean at massa leo. Vestibulum in varius arcu.</p>
								</div>
                                
                                <!-- Fourth-Entry -->
								<div class="entry">
									<!-- Heading of the  post -->
									<h3>Arm issue</h3>
									
									<!-- Meta for this block -->
									<div class="meta">
										<i class="fa fa-calendar"></i>&nbsp; Dec 13, 2013 &nbsp;&nbsp;&nbsp;<i class="fa fa-user"></i>&nbsp; Admin &nbsp;&nbsp;&nbsp;<i class="fa fa-folder-open"></i><a href="#">&nbsp; General</a> <span class="pull-right"><i class="fa fa-comment"></i> <a href="#">&nbsp;3 Comments</a></span>
									</div>
									<!-- Post Images -->
									<div class="blog-img">
										<img src="disease/hand.jpg" class="img-responsive img-thumbnail" alt="" />
									</div>
									<!-- Para -->
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vulputate eros nec odio egestas in dictum nisi vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse porttitor luctus imperdiet. <a href="#">Praesent ultricies</a> enim ac ipsum aliquet pellentesque. Nullam justo nunc, dignissim at convallis posuere, sodales eu orci. Duis a risus sed dolor placerat semper quis in urna. Nam risus magna, fringilla sit amet blandit viverra, dignissim eget est. Ut <strong>commodo ullamcorper risus nec</strong> mattis. Fusce imperdiet ornare dignissim. Donec aliquet convallis tortor, et placerat quam posuere posuere. Morbi tincidunt posuere turpis eu laoreet. Nulla facilisi. Aenean at massa leo. Vestibulum in varius arcu.</p>
								</div>
						  </div>
							
							<!-- Pagination -->
                            <div class="paging">
								<span class='current'>1</span>
								<a href='#'>2</a>
								<span class="dots">&hellip;</span>
								<a href='#'>6</a>
								<a href="#">Next</a>
							</div>
							<div class="clearfix"></div>
							<!-- Pagination End -->
						</div>
						<!-- Blog post End -->
						
						<!-- Side Bar Start -->
						<div class="col-md-4 col-sm-4">
							<div class="inner-sidebar">
								<!-- Sidebar widget -->
								<!-- First -->
								<div class="side-widget">
									<h4 class="br-green">Search</h4>
									<div class="widget-content">
										<!-- search button and input box -->
										<form role="form" class="form-inline bform">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="Type to search">
											</div>
											<button type="button" class="btn btn-info">Search</button>
										</form>
									</div>
								</div>
								<!-- Second -->
								<div class="side-widget">
									<h4 class="br-orange">Recent Posts</h4>
									<div class="widget-content">
										<ol>
											<? include("inc.recent.php");?>
										</ol>
									</div>
								</div>
								<!-- Third -->
								<div class="side-widget">
									<h4 class="br-lblue">Tags</h4>
									<div class="widget-content">
										<? include("inc.tags.php");?>									</div>
							  </div>
								<!-- Fourth -->
								<div class="side-widget">
									<h4 class="br-purple">About Us</h4>
									<div class="widget-content">
										<p>Foresee the pain ancondb imentum rutrum aliquet. Quisque eu consectetur erat. Proin rutrum, erat egd trouble that are bound</p>
										<div class="social">
											<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
											<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
											<a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
											<a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Side BAr End -->
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