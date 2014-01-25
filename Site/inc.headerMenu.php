<div class="header">
			<div class="container">
				<!-- Navigation Menu Start -->
				<div class="navigation">
					<div class="row">
						<!-- Navigation Menu Link Lists -->
						<div class="col-md-2 col-sm-4 col-xs-6">
							<div class="menu">
								<span class="br-lblue"><i class="fa fa-desktop"></i> &nbsp; Menu Column</span>
								<div class="menu-list">
									<ul>
										<li><a href="service.html"><i class="fa fa-gear red"></i> Service</a></li>
										<li><a href="features.html"><i class="fa fa-check-square-o lblue"></i> Features</a></li>
										<li><a href="aboutus.html"><i class="fa fa-user pink"></i> About Us</a></li>
										<li><a href="gallery.html"><i class="fa fa-picture-o orange"></i> Gallery</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-2 col-sm-4 col-xs-6">
							<div class="menu">
								<span class="br-green"><i class="fa fa-desktop"></i> &nbsp; Menu Column</span>
								<div class="menu-list">
									<ul>
										<li><a href="portfolio.html"><i class="fa fa-camera green"></i> Portfolio</a></li>
										<li><a href="blog.php"><i class="fa fa-comments-o blue"></i> Blog Page</a></li>
										<li><a href="pricing.html"><i class="fa fa-table red"></i> Pricing Table</a></li>
										<li><a href="comingsoon.html"><i class="fa fa-times lblue"></i> Coming Soon</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-2 col-sm-4 col-xs-6">
							<div class="menu">
								<span class="br-red"><i class="fa fa-desktop"></i> &nbsp; Menu Column</span>
								<div class="menu-list">
									<ul>
										<li><a href="products.html"><i class="fa fa-puzzle-piece pink"></i> Products</a></li>
										<li><a href="contact.html"><i class="fa fa-phone orange"></i> Contact Us</a></li>
										<?
                                        if($_SESSION["sess_doc_id"]=="")
										{
										?>
                                        <li><a href="index.php"><i class="fa fa-sign-in green"></i> Login / Register</a></li>
                                        <?
                                        }
										else
										{
										?>
                                        <li><a href="index.php?act=logout"><i class="fa fa-sign-in green"></i> Logout</a></li>
										<?
										}
										?>
										<li><a href="error.html"><i class="fa fa-question blue"></i> 404 Error Page</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-2 col-sm-4 col-xs-6">
							<div class="menu">
								<span class="br-orange"><i class="fa fa-desktop"></i> &nbsp; Menu Column</span>
								<div class="menu-list">
									<ul>
										<li><a href="faq.html"><i class="fa fa-question red"></i> FAQ</a></li>
										<li><a href="careers.html"><i class="fa fa-briefcase lblue"></i> Careers</a></li>
										<li><a href="testimonials.html"><i class="fa fa-group pink"></i> Testimonials</a></li>
										<li><a href="support.html"><i class="fa fa-envelope orange"></i> Support</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 hidden-xs">
							<div class="sform br-white">
								<span><i class="icon-envelope lblue"></i> Subscription</span>
								<div class="form">
									<form role="form">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Enter your Name">
											<input type="email" class="form-control" placeholder="Enter your E-mail">
											<button type="button" class="btn btn-info btn-sm">Subscribe</button>
											<button type="button" class="btn btn-default btn-sm">Reset</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
				<!-- Navigation menu end -->
		</div>
        <div class="menu-btn">
				<a href="#">Menu <i class="fa fa-chevron-down"></i></a>
			</div>