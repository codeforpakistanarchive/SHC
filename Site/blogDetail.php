<?
include("connection/cn.php");
include("inc.checkSession.php");
if($_POST["Insert"]=="True")
{
	mysql_query("Insert into posts_replies set
					doctor_id = '".$_SESSION["sess_doc_id"]."',
					post_id = '".$_REQUEST["id"]."',
					detail = '".$_REQUEST["detail"]."',
					createdDate = now()");
	header("location: blogDetail.php?id=".$_REQUEST["id"]);
	exit;
}

$resultPosts = mysql_query("Select * from posts where id = '".$_REQUEST["id"]."'");
$rowPosts = mysql_fetch_array($resultPosts);
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Title here -->
		<title>SHC-<?=$rowPosts["heading"]?></title>
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
				<h2><i class="fa fa-comment-o orange"></i><strong><?=$rowPosts["heading"]?></strong> <a href="#"><span style="color:#FF0000">Listen Recording <i class="fa fa-play-circle-o"></i></span></a></h2>
				<div class="inner-blog">
					<div class="row">
						<div class="col-md-8 col-sm-8">
							<!-- The new post done by user's all in the post block -->
							<div class="blog-post">
								<!-- Entry is the one post for each user -->
								<div class="entry">
									<!-- Heading of the  post -->
									<h3><?=$rowPosts["heading"]?></h3>
									<?
                                    $resultPostReplies = mysql_query("Select * from posts_replies where post_id = '".$_REQUEST["id"]."' order by id desc");
									$totalReplies = mysql_num_rows($resultPostReplies);
									?>
									<!-- Meta for this block -->
									<div class="meta">
										<i class="fa fa-calendar"></i>&nbsp; <?=date("F d, Y", strtotime($rowPosts["createdDate"]))?> &nbsp;&nbsp;&nbsp;<i class="fa fa-user"></i>&nbsp; Admin &nbsp;&nbsp;&nbsp;<i class="fa fa-folder-open"></i><a href="#">&nbsp; General</a> <span class="pull-right"><i class="fa fa-comment"></i> <a href="#">&nbsp;<?=$totalReplies?> Comments</a></span>
									</div>
									<!-- Post Images -->
									<div class="blog-img">
										<!--<img src="img/blog1.jpg" class="img-responsive img-thumbnail" alt="" />-->
									</div>
									<!-- Para -->
									<p><?=$rowPosts["detail"]?></p>
								</div>
								
								<!-- Comment section -->
                  
								<div class="comments">
                                    <div class="title"><h5><?=$totalReplies?> Comments</h5></div>
                                    <ul class="comment-list">
										<?
                                        while($rowPostReplies = mysql_fetch_array($resultPostReplies))
										{
											$resultDoc = mysql_query("Select * from doctors where id = '".$rowPostReplies["doctor_id"]."'");
											$rowDoc = mysql_fetch_array($resultDoc);
										?>
                                        <li class="comment">
											<a class="pull-left" href="#">
												<img class="avatar" src="img/user-xs.jpg" alt="" />
											</a>
											<div class="comment-author"><a href="#"><?=stripslashes($rowDoc["name"])?></a></div>
											<div class="cmeta">Commented on <?=date("F d, Y", strtotime($rowPostReplies["createdDate"]))?></div>
											<p><?=stripslashes($rowPostReplies["detail"])?></p>
											<div class="clearfix"></div>
										</li>
                                        <?
                                        }
										?>
										<? /*?>
                                        <li class="comment reply">
											<a class="pull-left" href="#">
												<img class="avatar" src="img/user-xs.jpg" alt="" />
											</a>
											<div class="comment-author"><a href="#">Uiousve Rsionsha</a></div>
											<div class="cmeta">Commented on 02/08/2013</div>
											<p>Nulla facilisi. Sed justo dui, scelerisque ut consectetur vel, eleifend id erat. Phasellus condimentum rutrum aliquet. Quisque eu consectetur erat.</p>
								
											<div class="clearfix"></div>
                                    	</li>
										<? */?>
                                    </ul>
								</div>
								
								<!-- Comment posting -->
                              
								<div class="respond well">
									<div class="title"><h5>Post Reply</h5></div>
									<div class="form">
										<form class="form-horizontal" role="form" method="post" action="">
											<div class="form-group">
												<label class="control-label col-lg-2" for="comment">Comment</label>
												<div class="col-lg-10">
												  <textarea class="form-control" id="detail" name="detail" rows="3"></textarea>
												</div>
											</div>
											  
											<div class="form-group">
												<div class="col-lg-offset-2 col-lg-10">
													<button type="submit" class="btn btn-info">Submit</button> &nbsp;
													<button type="reset" class="btn">Reset</button>
                                                    <input type="hidden" name="Insert" value="True">
												</div>
											</div>
										</form>
									</div>
								</div>
								<!-- Navigation -->
                              
								<div class="navigation button">  
									<div class="pull-left"><a href="#" class="btn btn-info btn-sm">&laquo; Previous Post</a></div>
                                    <div class="pull-right"><a href="#" class="btn btn-info btn-sm">Next Post &raquo;</a></div>
                                    <div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
							</div>
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
										<? include("inc.tags.php");?>
									</div>
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