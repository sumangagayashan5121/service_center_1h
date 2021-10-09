<!DOCTYPE html>
<html lang="en">
<head>
<!--	<meta charset="utf-8">-->
<!--	<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href=" ">
	<title>Sashintha Service center</title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/css/bootstrap1.min.css">
	<!-- Custom styles for this template -->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/css/custom.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/css/loaders.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/css/swiper.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/css/nivo-lightbox.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/css/nivo_themes/default/default.css">

	<!-- Font Awesome Style -->
	<link href="<?= base_url() ?>libraries/fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<style>
		.contact-sec {
			background: url(<?= base_url() ?>libraries/images/customer/contact-bg1.jpg) no-repeat 0 bottom;
			background-size: cover;
		}
		.about-sec {
			background: url('<?= base_url() ?>libraries/images/customer/para-011.jpg') no-repeat center center;
			background-size: cover;
			color: #fff;
			position: relative;
		}
		.video-sec {
			background: url('<?= base_url() ?>libraries/images/customer/video-bg1.jpg') 50% 0 repeat-y fixed;
			-webkit-background-size: cover;
			background-size: cover;
			background-position: center center;
			text-align: center;
			position: relative;
			color: #fff;
		}

	</style>
</head>
<body>
<div class="loader loader-bg">
	<div class="loader-inner ball-clip-rotate-pulse">
		<div></div>
		<div></div>
	</div>
</div>

<!-- Top Navigation -->
<nav class="navbar navbar-toggleable-md mb-4 top-bar navbar-static-top sps sps--abv">
	<div class="container">
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse1" aria-controls="navbarCollapse"
				aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="#">Sashintha<span>&nbsp; Service center</span></a>
		<div class="collapse navbar-collapse" id="navbarCollapse1">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active"> <a class="nav-link" href="#myCarousel">Home <span class="sr-only">(current)</span></a> </li>
				<li class="nav-item"> <a class="nav-link" href="#why?">Why</a> </li>
				<li class="nav-item"> <a class="nav-link" href="#about">About</a> </li>
				<li class="nav-item"> <a class="nav-link" href="#blog">Details</a> </li>
<!--				<li class="nav-item"> <a class="nav-link" href="#gallery">Image Gallery</a> </li>-->
				<li class="nav-item"> <a class="nav-link" href="#contact">Contact</a> </li>
				<li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>index.php/LoginController/booking">Booking</a> </li>
				<li class="nav-item"> <a class="nav-link" id="log" name="log" href="<?= base_url() ?>index.php/LoginController/login"><?php echo $log; ?></a> </li>
			</ul>
		</div>
	</div>
</nav>


<!-- Swiper Silder
    ================================================== -->
<!-- Slider main container -->
<div class="swiper-container main-slider" id="myCarousel">
	<div class="swiper-wrapper">
		<div class="swiper-slide slider-bg-position" style="background:url('<?= base_url() ?>libraries/images/customer/car-wash-1619823_1920.jpg')" data-hash="slide1">
			<h2>maintain standards in professional diagnosis service using state of the art equipment & genuine auto parts for our customers.</h2>
		</div>
		<div class="swiper-slide slider-bg-position" style="background:url('<?= base_url() ?>libraries/images/customer/333.jpg')" data-hash="slide2">
			<h2>We act with integrity and we are honest about our work in order to be fair & ethical.</h2>
		</div>
	</div>
	<!-- Add Pagination -->
	<div class="swiper-pagination"></div>
	<!-- Add Navigation -->
	<div class="swiper-button-prev"><i class="fa fa-chevron-left"></i></div>
	<div class="swiper-button-next"><i class="fa fa-chevron-right"></i></div>
</div>

<!-- Benefits
    ================================================== -->
<section class="service-sec" id="why?">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading text-md-center text-xs-center">
					<h2><small>Benefits of service</small>Why should I have my car serviced?</h2>
				</div>
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-6 text-sm-center service-block"> <i class="fa fa-usd" aria-hidden="true"></i>
						<h3>Pay now, save later</h3>
						<p>Taking care and dealing with the smaller issues at an early stage will save you money in the long run. Although you would be paying in the present, it cou
							ld be much more expensive if you let the issue get worse, and become a bigger problem to repair or replace.</p>
					</div>
					<div class="col-md-6 text-sm-center service-block"> <i class="fa fa-tint" aria-hidden="true"></i>

						<h3>Save money on Fuel</h3>
						<p>A healthy car tends to be more affordable to run. With its engine and components running at their most effective level, your car is likely to be more fuel efficient, saving you cash at the petrol pump</p>
					</div>
					<div class="col-md-6 text-sm-center service-block"><i class="fa fa-heart-o" aria-hidden="true"></i>

						<h3>Car lifespan</h3>
						<p>A car that’s been taken care of will have a longer life expectancy, saving you from forking out on a new motor any time soon</p>
					</div>
					<div class="col-md-6 text-sm-center service-block"> <i class="fa fa-medkit" aria-hidden="true"></i>
						<h3>Insurance</h3>
						<p>If you have an accident and your car isn’t repairable and needs to be replaced, your insurer may use your car’s service history to estimate its pre-accident value.
							Having a full service history could improve its valuation figure.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4"> <img src="<?= base_url() ?>libraries/images/customer/side-1.jpg" class="img-fluid" /> </div>
		</div>
		<!-- /.row -->
	</div>
</section>

<!-- About
    ================================================== -->
<section class="about-sec parallax-section" id="about">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<h2><small>Who We Are</small>About<br>
					Our Service center</h2>
			</div>
			<div class="col-md-4">
				<p>Sashintha service center was initiated in the year 2010. It has been established itself as a high-quality brand providing motorists with a range of car service. As a trusted solution provider in the automobile service industry in Sri Lanka, Sashintha service center will continue to provide premier quality automobile products and services.</p>
			</div>
			<div class="col-md-4">
				<p>We strive to provide the best quality automobile product and services through Service Centre,
					at affordable prices by making our brand a consumers’ first choice for automobile product and service supports.
					Trust will be gained from consumers through the genuine support given to them by our skilled and dedicated service staff.
					We are committed to deliver our service values and we are proud of our customized service</p>
			</div>
		</div>
	</div>
</section>

<!-- BLOG
    ================================================== -->

<section class="blog-sec" id="blog">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading text-md-center text-xs-center">
					<h2>Our services</h2>
				</div>
			</div>
			<div class="col-md-6 blog-box">
				<h3 class="blog-title"><small>Car wash packages</small></h3>

				<h2><small>QUICK WASH</small></h2>
				<p class="blog-content">Body wash, and tyre dressing</p>
				<h2><small>DETAILED WASH</small></h2>
				<p class="blog-content">Body wash,carpet wash,glass cleaning and tyre dressing</p>
				<h2><small>WASH & WAX</small></h2>
				<p class="blog-content">Body wash,carpet wash,glass cleaning,tyre dressing,interior vacuuming and 3M wax</p>
				<h2><small>AUTO WASH</small></h2>
				<p class="blog-content">Body wash,under wash,carpet wash,glass cleaning and interior vacuuming</p>
			</div>
			<div class="col-md-6 blog-box">
				<h3 class="blog-title"><small>Lubrication Services</small></h3>
				<h2><small>UNDERCARRIAGE DEGREASING</small></h2>
				<p class="blog-content">We completed deg undercarriage of the automobile.removing accumulated using the application of pressure washes with advanced sensors</p>
				<h2><small>VACUUM FLOOR/SEAT & TRUNK</small></h2>
				<p class="blog-content">We vacuum the seats and trunk to ensure removal of dust</p>
				<h2><small>WINDSCREEN & GLASS CLEANING</small></h2>
				<p class="blog-content">Our glass treatment is wet weather driving visibility treatment.ammonia free and safe for safe for tinted windows this uses high humidity conditions</p>
			</div>
		</div>
	</div>
</section>

<!-- VIDEO
    ================================================== -->

<!--<section class="gallery-sec" id="gallery">-->
<!--	<div class="container">-->
<!--		<div class="row">-->
<!--			<div class="col-md-12">-->
<!--				<div class="heading text-md-center text-xs-center">-->
<!--					<h2><small>Stroy Through Images</small>Fitness Image Gallery</h2>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="col-md-12">-->
<!--				<!-- iso section -->-->
<!--				<div class="iso-section text-md-center text-xs-center" data-wow-delay="0.5">-->
<!--					<ul class="filter-wrapper clearfix">-->
<!--						<li><a href="#" data-filter="*" class="selected opc-main-bg">All</a></li>-->
<!--					</ul>-->
<!---->
<!--					<!-- iso box section -->-->
<!--					<div class="iso-box-section wow fadeInUp" data-wow-delay="0.9s">-->
<!--						<div class="iso-box-wrapper col4-iso-box">-->
<!--							<div class="iso-box london paris ny col-md-4 col-sm-6">-->
<!--								<div class="gallery-thumb"> <a href="--><?//= base_url() ?><!--libraries/images/customer/photo-gallery-01.jpg" data-lightbox-gallery="food-gallery"> <img src="--><?//= base_url() ?><!--libraries/images/customer/photo-gallery-01.jpg" class="fluid-img" alt="Gallery">-->
<!--										<div class="gallery-overlay">-->
<!--											<div class="gallery-item"> <i class="fa fa-search"></i> </div>-->
<!--										</div>-->
<!--									</a> </div>-->
<!--							</div>-->
<!--							<div class="iso-box london ny hn col-md-4 col-sm-6">-->
<!--								<div class="gallery-thumb"> <a href="--><?//= base_url() ?><!--libraries/images/customer/photo-gallery-02.jpg" data-lightbox-gallery="food-gallery"> <img src="--><?//= base_url() ?><!--libraries/images/customer/photo-gallery-02.jpg" class="fluid-img" alt="Gallery">-->
<!--										<div class="gallery-overlay">-->
<!--											<div class="gallery-item"> <i class="fa fa-search"></i> </div>-->
<!--										</div>-->
<!--									</a> </div>-->
<!--							</div>-->
<!--							<div class="iso-box hn col-md-4 col-sm-6">-->
<!--								<div class="gallery-thumb"> <a href="--><?//= base_url() ?><!--libraries/images/customer/photo-gallery-03.jpg" data-lightbox-gallery="food-gallery"> <img src="--><?//= base_url() ?><!--libraries/images/customer/photo-gallery-03.jpg" class="fluid-img" alt="Gallery">-->
<!--										<div class="gallery-overlay">-->
<!--											<div class="gallery-item"> <i class="fa fa-search"></i> </div>-->
<!--										</div>-->
<!--									</a> </div>-->
<!--							</div>-->
<!--							<div class="iso-box london col-md-4 col-sm-6">-->
<!--								<div class="gallery-thumb"> <a href="--><?//= base_url() ?><!--libraries/images/customer/photo-gallery-04.jpg" data-lightbox-gallery="food-gallery"> <img src="--><?//= base_url() ?><!--libraries/images/customer/photo-gallery-04.jpg" class="fluid-img" alt="Gallery">-->
<!--										<div class="gallery-overlay">-->
<!--											<div class="gallery-item"> <i class="fa fa-search"></i> </div>-->
<!--										</div>-->
<!--									</a> </div>-->
<!--							</div>-->
<!--							<div class="iso-box ny col-md-4 col-sm-6">-->
<!--								<div class="gallery-thumb"> <a href="--><?//= base_url() ?><!--libraries/images/customer/photo-gallery-05.jpg" data-lightbox-gallery="food-gallery"> <img src="--><?//= base_url() ?><!--libraries/images/customer/photo-gallery-05.jpg" class="fluid-img" alt="Gallery">-->
<!--										<div class="gallery-overlay">-->
<!--											<div class="gallery-item"> <i class="fa fa-search"></i> </div>-->
<!--										</div>-->
<!--									</a> </div>-->
<!--							</div>-->
<!--							<div class="iso-box paris lunch col-md-4 col-sm-6">-->
<!--								<div class="gallery-thumb"> <a href="--><?//= base_url() ?><!--libraries/images/customer/photo-gallery-06.jpg" data-lightbox-gallery="food-gallery"> <img src="--><?//= base_url() ?><!--libraries/images/customer/photo-gallery-06.jpg" class="fluid-img" alt="Gallery">-->
<!--										<div class="gallery-overlay">-->
<!--											<div class="gallery-item"> <i class="fa fa-search"></i> </div>-->
<!--										</div>-->
<!--									</a> </div>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</section>-->
<section class="contact-sec" id="contact">
	<div class="container">
		<form action="<?= base_url() ?>index.php/DashboardController/send" method="post">
		<h2>Get in Touch <small>Our work is the presentation of our capabilities.</small> </h2>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="exampleName">Name</label>
					<input type="text" class="form-control" id="exampleName" aria-describedby="emailHelp" name="name" required autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="examplePhone">Phone Number</label>
					<input type="text" class="form-control" id="examplePhone" aria-describedby="emailHelp" name="mobile" autocomplete="off"
						   pattern="[0-9]{10}"
						   title="Please enter valid mobile number with ten numbers" required>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" autocomplete="off"
						   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
					<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> </div>
			</div>
			<div class="col-md-12">
				<label for="exampleTextarea">Enter your Message</label>
				<textarea class="form-control" id="exampleTextarea" rows="3" name="content" required autocomplete="off"></textarea>
			</div>
			<div class="col-md-12 text-xs-center action-block"> <button type="submit" class="btn btn-capsul btn-aqua">Submit</button> </div>
		</div>
		</form>
	</div>
</section>
<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-sm-4">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Benefits</a></li>
					<li><a href="#">About</a></li>
				</ul>
			</div>
			<div class="col-md-2 col-sm-4">
				<ul>
					<li><a href="#">Service center</a></li>
					<li><a href="#">Image Gallery</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
			</div>

			<div class="col-md-6 col-sm-12">
				<h2>About our Service center</h2>
				<p>We act with integrity and we are honest about our work in order to be fair & ethical.
					We develop a long term relationship with our stakeholders by practising fair principles.
					We will maintain highest standards in professional diagnosis service & repair using state of the art equipment & genuine auto parts for our customers.</p>
			</div>
		</div>
		<div class="row copy-footer">
			<div class="col-sm-6 col-md-3"><i class="fa fa-phone" aria-hidden="true"></i> 076-6449757 </div>
			<div class="col-sm-6 col-md-3 pull-right text-xs-right"><i class="fa fa-envelope-o" aria-hidden="true"> -sumangagayashan98@gmail.com</i>
			</div>
		</div>
	</div>
</footer>

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?= base_url() ?>libraries/js/customer/jquery.min.js"></script>
<script src="<?= base_url() ?>libraries/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>libraries/js/scrollPosStyler.js"></script>
<script src="<?= base_url() ?>libraries/js/swiper.min.js"></script>
<script src="<?= base_url() ?>libraries/js/isotope.min.js"></script>
<script src="<?= base_url() ?>libraries/js/nivo-lightbox.min.js"></script>
<script src="<?= base_url() ?>libraries/js/wow.min.js"></script>
<script src="<?= base_url() ?>libraries/js/core.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
