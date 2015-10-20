<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png" type="image/x-icon">



	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/responsive.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/pure-drawer.css"/>

	<link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>

	<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.min.js"></script>

	<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/bootstrap.min.js"></script>

	<script src="http://code.jquery.com/jquery-1.8.2.min.js" type="text/javascript"></script>
	<script src="<?php echo get_template_directory_uri();?>/js/jquery.carouFredSel-6.0.4-packed.js" type="text/javascript"></script>


	<script type="text/javascript">
		$(function() {

			$('#carousel ul').carouFredSel({
				prev: '#prev',
				next: '#next',
				pagination: "#pager",
				scroll: 1000
			});

		});
	</script>


<script>
	$( document ).ready(function() {
	var main_url = '<img src="<?php echo get_template_directory_uri();?>/images/home_icon.png">';
	$('.main_nav > li:first a').html(main_url);

	});
</script>



	<script>
		$( document ).ready(function() {
			var main_url = '<img src="<?php echo get_template_directory_uri();?>/images/top_search_icon.png">';
			$('.main_nav > li:last a').html(main_url);

		});
	</script>


	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>></body>

<div class="container-fluid topHeader">
	<div class="row">


		<div class="menuBanner">
			<a href="<?php bloginfo('url'); ?>">
				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 logo">

				</div></a>



			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">

			</div>


			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 topBanner">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 flagIcon">

						<a class="russianLink" target="_blank" href="http://bengallogistics.blogspot.com/2015/02/blog-post.html"><span class="german"> </span>

						</a>

						<a class="frenchLInk" target="_blank" href="http://bengallogistics.blogspot.com/2013/10/bangladesh-at-glance-french-version.html"><span class="french"></span>

						</a>

						<a class="italianLInk" target="_blank" href="http://bengallogistics.blogspot.com/2013/10/bangladesh-at-glance-french-version.html"><span class="italian"></span>

						</a>
						<a class="japaneseLInk" target="_blank" href="http://www.bengaltours.net/"><span class="japanese"> </span>

						</a>
						<a class="germanLInk" target="_blank" href="http://bengaltours.com/images/German.pdf"><span class="german"> </span>

						</a>


					</div>
				</div>





				<div class="pure-container  visible-xs" data-effect="pure-effect-push" >
					<input type="checkbox" id="pure-toggle-right" class="pure-toggle" data-toggle="right"/>
					<label class="pure-toggle-label" for="pure-toggle-right" data-toggle-label="right"><span class="pure-toggle-icon"></span></label>

					<nav class="pure-drawer" data-position="right">
						<!--            <p style="padding: 100px 20px; margin: 0;">Insert your off-canvas content here</p>-->

						<!--<ul class="nav navbar-nav">-->


						<ul>
							<li><a href="#">Home</a></li>
							<li>
								<a href="#"> Company</a>

							</li>
							<li><a href="#">Bangladesh at a glance</a>
								<ul>
									<li><a href="#">Explore Bangladesh</a></li>
									<li><a href="#">World Heritage Tour</a></li>
									<li><a href="#">Cultural Tour</a></li>
									<li><a href="#">Cultural Tour</a></li>
									<li><a href="#">Trip to tea capital</a></li>
									<li>

										<a href="#">Rocket Steamer</a>
										<!--<ul>-->
										<!--<li><a href="#">Trip to the Chittagong hill track</a></li>-->
										<!--<li><a href="#">Responsible Tourism</a></li>-->
										<!--<li><a href="#">Dhaka City Sight Seeing Suburbs</a></li>-->
										<!--<li><a href="#">Hills & Beach</a></li>-->
										<!--<li><a href="#">Tailor Made Tour</a></li>-->
										<!--<li><a href="#">Photography Tour</a></li>-->
										<!--<li><a href="#">Daylong Sundarbans</a></li>-->
										<!--<li><a href="#">Trip to North Bengal</a></li>-->
										<!--<li><a href="#">Village HomeStay</a></li>-->
										<!--</ul>-->

									<li><a href="#">Trip to the Chittagong hill track</a></li>
									<li><a href="#">Responsible Tourism</a></li>
									<li><a href="#">Dhaka City Sight Seeing Suburbs</a></li>
									<li><a href="#">Hills & Beach</a></li>
									<li><a href="#">Tailor Made Tour</a></li>
									<li><a href="#">Photography Tour</a></li>
									<li><a href="#">Daylong Sundarbans</a></li>
									<li><a href="#">Trip to North Bengal</a></li>
									<li><a href="#">Village HomeStay</a></li>
								</ul>
							</li>
							<li><a href="#">Interesting place</a></li>
							<li><a href="#">Contact us</a></li>

						</ul>

					</nav>

					<div class="pure-pusher-container">
						<div class="pure-pusher">
							<!--<p style="width: 300px; height: 1800px; margin: 100px auto;">-->

							<!--</p>-->

						</div>

					</div>
				</div>


				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 visible-sm visible-md visible-lg mainMenu">
						<?php
						$menu_args = array(
							'theme_location'  => 'primary',
							'menu'            => '',
							'container'       => '',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'main_nav',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 0,
							'walker'          => ''
						);
						wp_nav_menu( $menu_args );
						?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>


